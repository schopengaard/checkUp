@extends('layouts.app')
@section('content')
<div class="card w-100">

	<div class="card-header">
		<div class="row">
			<div class="col-sm-2">
				<a href="{{ action('PatientController@appointment_page') }}" class="nodeco">
					<i class="fas fa-chevron-left"></i>
					Back
				</a>
			</div>
			<div class="col-sm-8 text-center">
				{{ __('Appointment') }}
			</div>
			<div class="col-sm-2"></div>
		</div>
	</div>
	@foreach($appointment as $a_row)
	<div class="card-body">
		<div class="row">
			<div class="col-md-4">Doctor Name</div>
			<div class="col-md-7 card-text">{{ $a_row->id }}</div>
		</div>
		<div class="row">
			<div class="col-md-4">Doctor ID</div>
			<div class="col-md-7 card-text">{{$a_row->date}}</div>
		</div>
		<div class="row">
			<div class="col-md-4">Email</div>
			<div class="col-md-7 card-text">{{ $a_row->time }}</div>
		</div>
		<div class="row">
			<div class="col-md-4">Age</div>
			<div class="col-md-7 card-text">{{ $a_row->doctor_id }}</div>
		</div>
		<div class="row">
			<div class="col-md-4">Specialty</div>
			<div class="col-md-7 card-text">{{ $a_row->description }}</div>
		</div>
		<div class="row">
			<div class="col-md-4">City</div>
			<div class="col-md-7 card-text">{{ $a_row->medicine_reminder }}</div>
		</div>
		<div class="row">
			<div class="col-md-4">Address</div>
			<div class="col-md-7 card-text">{{ $a_row->bill_id }}</div>
		</div>
		<div class="mb-4"></div>
	</div>
	@endforeach
</div>
@endsection
