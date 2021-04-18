@extends('layouts.app')
@section('title', 'Bill Page')

@section('topPart')
<div class="container mt-4">
	<div class="row justify-content-center">
		<!-- Profile Header -->
		@include('partials._adminHeader')
		@include('partials._admintabs', array([$tab[0]=''], [$tab[1]=''], [$tab[2]=''], [$tab[3]=''], [$tab[4]='active'], [$tab[5]='']))
	</div>
</div>
@endsection

@section('content')
<div class="row col-sm-12 px-0 mx-0 mb-3">
	<div class="flex-grow-1">
		<form action="{{ action('AdminController@search_bill') }}" method="get">
			<div class="input-group">
				<input type="text" name="search_bill" class="form-control" placeholder="Search Bills" aria-label="Search Bills" aria-describedby="basic-addon2">
				<div class="input-group-append">
					<button type="submit" class="btn btn-outline-secondary">Search</button>
				</div>
			</div>
		</form>
	</div>
	<div class="ml-4">
		<a href="{{ action('AdminController@create_bill') }}" class="btn mainColor1 addUserButton">Add Bill</a>
	</div>
</div>
<div class="card mb-3" style="border-radius: 15px; border-color: #A3BBB5">
	<table class="table table-sm table-hover tableBack mb-0">
		<thead>
			<tr>
				<th class="text-center" style="width: 30px">#</th>
				<th>Amount</th>
				<th>Description</th>
				<th class="text-right" style="max-width: 50px"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($bill as $row)
			<tr>
				<td class="text-center">{{ $row->id }}</td>
				<td>{{ $row->amount }}</td>
				<td>{{ $row->description }}</td>
				<td class="text-right">
					@include('partials._dropdown', array([$drop[0]='AdminController@show_doctor'], [$drop[1]='AdminController@edit_doctor'], [$drop[2]='AdminController@destroy_doctor']))
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="pagination justify-content-center">
	{{ $bill->links() }}
</div>
@endsection
