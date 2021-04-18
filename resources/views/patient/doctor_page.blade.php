@extends('layouts.app')
@section('title', 'Doctor Search Page')

@section('topPart')
<div class="container mt-4">
	<div class="row justify-content-center">
		@include('partials._patientHeader')
		@include('partials._patienttabs', array([$tab[0]=''], [$tab[1]='active'], [$tab[2]=''], [$tab[3]='']))
	</div>
</div>
@endsection

@section('content')
<div class="row col-sm-12 px-0 mx-0 mb-3">
	<div class="flex-grow-1">
		<form action="{{ action('PatientController@search_doctor') }}" method="get">
			<div class="input-group">
				<input type="text" name="search_doctor" class="form-control" placeholder="Search Doctors" aria-label="Search Doctors" aria-describedby="basic-addon2">
				<div class="input-group-append">
					<button type="submit" class="btn btn-outline-secondary">Search</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="card mb-3" style="border-radius: 15px; border-color: #A3BBB5">
	<table class="table table-sm table-hover tableBack mb-0">
		<thead>
			<tr>
				<th class="text-center" style="width: 40px">#</th>
				<th class="pl-3">Name</th>
				<th>Age</th>
				<th>Specialty</th>
				<th>City</th>
				<th>Address</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($doctor as $row)
			<tr>
				<td class="text-center border-right">{{ $row->id }}</td>
				<td class="pl-3">{{ $row->first_name }} {{ $row->last_name }}</td>
				<td>{{ $row->age }}</td>
				<td>{{ $row->specialty }}</td>
				<td>{{ $row->city }}</td>
				<td>{{ $row->address }}</td>
				<td class="text-right">
					@include('partials._dropdown', array([$drop[0]='PatientController@show_doctor']))
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="pagination justify-content-center">
	{{ $doctor->links() }}
</div>
@endsection
