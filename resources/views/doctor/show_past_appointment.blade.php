@extends('layouts.app')
@section('content')
<div class="card">
	@foreach($appointment as $row)
	<div class="card-header">
		<div class="row">
			<div class="col-sm-2">
				<a href="{{ action('DoctorController@past_appointment_page') }}" class="nodeco">
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
	<div class="card-body">
		<div class="row">
			<div class="col-md-3">Appointment ID</div>
			<div class="col-md-8 card-title">{{$row->id}}</div>
		</div>
		<div class="row">
			<div class="col-md-3">Date</div>
			<div class="col-md-8 card-title">{{ $row->date }}</div>
		</div>
		<div class="row">
			<div class="col-md-3">Time</div>
			<div class="col-md-8 card-title">{{ $row->time }}</div>
		</div>
		<div class="row">
			<div class="col-md-3">Patient ID</div>
			<div class="col-md-8 card-title">{{ $row->p_first_name }} {{ $row->p_last_name }}</div>
		</div>
		<div class="row">
			<div class="col-md-3">Description</div>
			<div class="col-md-8 card-title">{{ $row->description }}</div>
		</div>
		<div class="row">
			<div class="col-md-3">Medicine</div>
			<div class="col-md-8 card-title">{{ $row->medicine_reminder }}</div>
		</div>
		<div class="mb-4"></div>
	</div>
	@endforeach
</div>
@endsection
