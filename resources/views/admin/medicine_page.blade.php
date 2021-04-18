@extends('layouts.app')
@section('title', 'Medicine Page')

@section('topPart')
<div class="container mt-4">
	<div class="row justify-content-center">
		<!-- Profile Header -->
		@include('partials._adminHeader')
		@include('partials._admintabs', array([$tab[0]=''], [$tab[1]=''], [$tab[2]=''], [$tab[3]=''], [$tab[4]=''], [$tab[5]='active']))
	</div>
</div>
@endsection

@section('content')
<div class="row col-sm-12 px-0 mx-0 mb-3">
	<div class="flex-grow-1">
		<form action="{{ action('AdminController@search_medicine') }}" method="get">
			<div class="input-group">
				<input type="text" name="search_medicine" class="form-control" placeholder="Search Medicine" aria-label="Search Medicine" aria-describedby="basic-addon2">
				<div class="input-group-append">
					<button type="submit" class="btn btn-outline-secondary">Search</button>
				</div>
			</div>
		</form>
	</div>
	<div class="ml-4">
		<a href="{{ action('AdminController@create_medicine') }}" class="btn mainColor1 addUserButton">Add Medicine</a>
	</div>
</div>
<div class="card mb-3" style="border-radius: 15px; border-color: #A3BBB5">
	<table class="table table-sm table-hover tableBack mb-0">
		<thead>
			<tr>
				<th class="text-center" style="width: 30px">#</th>
				<th>Name</th>
				<th>Description</th>
				<th class="text-right">Price</th>
				<th class="text-right" style="max-width: 50px"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($medicine as $row)
			<tr>
				<td class="text-center">{{ $row->id }}</td>
				<td>{{ $row->name }}</td>
				<td>{{ $row->description }}</td>
				<td style="width: 90px"><span class="float-left">$ &nbsp</span><div class="text-right"> {{ $row->price }}.00 </div></td>
				<td class="text-right">
					@include('partials._dropdown', array([$drop[0]='AdminController@show_doctor'], [$drop[1]='AdminController@edit_doctor'], [$drop[2]='AdminController@destroy_doctor']))
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="pagination justify-content-center">
	{{ $medicine->links() }}
</div>
@endsection
