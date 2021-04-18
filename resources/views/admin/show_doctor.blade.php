@extends('layouts.app')
@section('content')
<div class="card w-100">
	@foreach($doctor as $doctor)
	<div class="card-header">DOCTOR</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-3">Doctor ID</div>
			<div class="col-md-8 card-title">{{$doctor->id}}</div>
		</div>
		<div class="row">
			<div class="col-md-3">Doctor Name</div>
			<div class="col-md-8 card-title">{{ $doctor->first_name }} {{ $doctor->last_name }}</div>
		</div>
		<div class="row">
			<div class="col-md-3">Email</div>
			<div class="col-md-8 card-text">{{ $doctor->email }}</div>
		</div>
		<div class="mb-4"></div>
		<a href="{{ action('AdminController@doctor_page') }}" class="btn btn-secondary">Back</a>
	</div>
	@endforeach
</div>
@endsection
