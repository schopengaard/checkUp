@extends('layouts.app')
@section('content')
<div class="card w-100">

	<div class="card-header">
		<div class="row">
			<div class="col-sm-2">
				<a href="{{ action('PatientController@medical_history_page') }}" class="nodeco">
					<i class="fas fa-chevron-left"></i>
					Back
				</a>
			</div>
			<div class="col-sm-8 text-center">
				{{ __('Medical History') }}
			</div>
			<div class="col-sm-2"></div>
		</div>
	</div>
	@foreach($history as $row)
	<div class="card-body">
		<div class="row">
			<div class="col-md-4">#</div>
			<div class="col-md-7 card-text">{{ $row->id }}</div>
		</div>
		<div class="row">
			<div class="col-md-4">Date</div>
			<div class="col-md-7 card-text">{{$row->date}}</div>
		</div>
		<div class="row">
			<div class="col-md-4">Time</div>
			<div class="col-md-7 card-text">{{ $row->time }}</div>
		</div>
		<div class="row">
			<div class="col-md-4">Doctor</div>
			<div class="col-md-7 card-text">{{ $row->doctor_id }}</div>
		</div>
		<div class="row">
			<div class="col-md-4">Description</div>
			<div class="col-md-7 card-text">{{ $row->description }}</div>
		</div>
		<div class="row">
			<div class="col-md-4">Note</div>
			<div class="col-md-7 card-text">{{ $row->medicine_reminder }}</div>
		</div>
		<div class="row">
			<div class="col-md-4">Bill</div>
			<div class="col-md-7 card-text">{{ $row->bill_id }}</div>
		</div>
		<div class="mb-4"></div>
	</div>
	@endforeach
</div>
@endsection
