@extends('layouts.app')
@section('content')
<div class="card w-100">
	@foreach($patient as $patient)
	<div class="card-header">PATIENT</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-3">Patient ID</div>
			<div class="col-md-8 card-title">{{$patient->id}}</div>
		</div>
		<div class="row">
			<div class="col-md-3">Patient Name</div>
			<div class="col-md-8 card-title">{{ $patient->first_name }} {{ $patient->last_name }}</div>
		</div>
		<div class="row">
			<div class="col-md-3">Email</div>
			<div class="col-md-8 card-text">{{ $patient->email }}</div>
		</div>
		<div class="mb-4"></div>
		<a href="{{ action('AdminController@patient_page') }}" class="btn btn-secondary">Back</a>
	</div>
	@endforeach
</div>
@endsection
