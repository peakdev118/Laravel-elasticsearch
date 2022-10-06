<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5 - Column sorting with pagination example from scratch</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>


<div class="container">
    <form method="GET" action="/">
		@csrf
		<div class="mb-3">
			<input type="search" class="form-control" id="searchValue" name="searchValue" value={{ request()->get('searchValue', '') }}>
		</div>
		<button type="submit" class="btn btn-primary">Search</button>
	</form>
    <h3 class="text-center">Laravel 5 - Column sorting with pagination example from scratch</h3>
    <table class="table table-bordered">
        <tr>
            <th width="80px">id</th>
            <th>@sortablelink('domain')</th>
            <th>@sortablelink('username')</th>
            <th>@sortablelink('country')</th>
            <th>@sortablelink('month')</th>
            <th>@sortablelink('year')</th>
        </tr>
        @if($products->count())
            @foreach($products as $key => $product)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $product->domain }}</td>
                    <td>{{ $product->username }}</td>
                    <td>{{ $product->country }}</td>
                    <td>{{ $product->month }}</td>
                    <td>{{ $product->year }}</td>
                </tr>
            @endforeach
        @endif
    </table>
    {!! $products->appends(\Request::except('page'))->render() !!}
</div>


</body>


</html>