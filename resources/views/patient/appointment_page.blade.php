@extends('layouts.app')
@section('title', 'Appointment Search Page')

@section('topPart')
<div class="container mt-4">
	<div class="row justify-content-center">
		@include('partials._patientHeader')
		@include('partials._patienttabs', array([$tab[0]='active'], [$tab[1]=''], [$tab[2]=''], [$tab[3]='']))
	</div>
</div>
@endsection

@section('content')
<div class="row col-sm-12 px-0 mx-0 mb-3">
	<div class="flex-grow-1">
		<form action="{{ route('patient.search_appointment') }}" method="get">
			<div class="input-group">
				<input type="text" name="search_appointment" class="form-control" placeholder="Search Appointments" aria-label="Search Appointments" aria-describedby="basic-addon2">
				<div class="input-group-append">
					<button type="submit" class="btn btn-outline-secondary">Search</button>
				</div>
			</div>
		</form>
	</div>
	<div class="ml-4">
		<a href="{{ route('patient.create_appointment') }}" class="btn mainColor3 addUserButton" >Add Appointment</a>
	</div>
</div>
<div class="card mb-3" style="border-radius: 15px; border-color: #A3BBB5">
	<table class="table table-sm table-hover tableBack mb-0">
		<thead>
			<tr>
				<th class="text-center" style="width: 40px">#</th>
				<th class="pl-3">Date</th>
				<th>Day</th>
				<th>Time</th>
				<th>Doctor</th>
				<th>Description</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($appointment as $row)
			<tr>
				<td class="text-center border-right">{{ $row->id }}</td>
				<td class="pl-3">{{date("M j, Y", strtotime(" $row->date "))}}</td>
				<td>{{date("D", strtotime(" $row->date "))}}</td>
				<td>{{date("g:i A", strtotime(" $row->time "))}}</td>
				<td>{{ $row->d_first_name }} {{ $row->d_last_name }}</td>
				<td>{{ $row->description }}</td>
				<td class="text-right">
					@include('partials._dropdown', array([$drop[0]='PatientController@show_appointment'], [$drop[1]='PatientController@edit_appointment'], [$drop[2]='PatientController@destroy_appointment']))
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="pagination justify-content-center">
	{{ $appointment->links() }}
</div>
@endsection
