@extends('layouts.app')
@section('title', 'Patient Page')

@section('topPart')
<div class="container mt-4">
	<div class="row justify-content-center">
		<!-- Profile Header -->
		@include('partials._adminHeader')
		@include('partials._admintabs', array([$tab[0]='active'], [$tab[1]=''], [$tab[2]=''], [$tab[3]=''], [$tab[4]=''], [$tab[5]='']))
	</div>
</div>
@endsection

@section('content')
<div class="row col-sm-12 px-0 mx-0 mb-3">
	<div class="flex-grow-1">
		<form action="{{ action('AdminController@search_patient') }}" method="get">
			<div class="input-group">
				<input type="text" name="search_patient" class="form-control" placeholder="Search Patients" aria-label="Search Patients" aria-describedby="basic-addon2">
				<div class="input-group-append">
					<button type="submit" class="btn btn-outline-secondary">Search</button>
				</div>
			</div>
		</form>
	</div>
	<div class="ml-4">
		<a href="{{ action('AdminController@create_patient') }}" class="btn mainColor1 addUserButton">Add Patient</a>
	</div>
</div>
<div class="card mb-3" style="border-radius: 15px; border-color: #A3BBB5">
	<table class="table table-sm table-hover tableBack mb-0">
		<thead>
			<tr>
				<th class="text-center pl-2" style="width: 40px">#</th>
				<th>Name</th>
				<th>Age</th>
				<th>Care Card</th>
				<th class="text-right" style="max-width: 50px"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($patient as $row)
			<tr>
				<td class="text-center pl-2">{{ $row->id }} )</td>
				<td>{{ $row->first_name }} {{ $row->last_name }}</td>
				<td>{{ $row->age }}</td>
				<td>{{ $row->care_card }}</td>
				<td class="text-right">
					@include('partials._dropdown', array([$drop[0]='AdminController@show_patient'], [$drop[1]='AdminController@edit_patient'], [$drop[2]='AdminController@destroy_patient']))
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection
