<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Credential;
use Elasticsearch;

class IndexCredentials extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'index:credentials';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $credentials = Credential::all();

        foreach ($credentials as $credential) {
            try {
                Elasticsearch::index([
                    'id' => $credential->id,
                    'index' => 'credentials',
                    'body' => [
                        'domain' => $credential->domain,
                    ]
                ]);
                
            } catch (Exception $e) {
                $this->info($e->getMessage());
            }
        }

        $this->info("Credentials were successfully indexed");
    }
}
