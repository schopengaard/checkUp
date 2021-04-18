@extends('layouts.app')
@section('title', 'Update Appointment')
@section('content')
<div class="container">
	<div class="col-md-6 offset-md-3">
		@if($message = Session::get('danger'))
		<div class="alert alert-danger">
			<strong>{{ $message }}</strong>
		</div>
		@endif
	</div>


	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ __('Update Appointment') }}</div>

				<div class="card-body">
					@foreach($appointment as $row)
					<form action="{{ action('DoctorController@update_appointment', $row->id) }}" method="post">
						@csrf
						@method('PATCH')
						<div class="form-group row">
							<div class="col-md-6">
								<label>Patient ID</label>
							</div>
							<div class="col-md-6">
								<div>{{ $row->patient_id }}</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label>Date</label>
								<input type="text" name="date" class="form-control" value="{{ $row->date }}">
							</div>
							<div class="col-md-6">
								<label>Time</label>
								<input type="text" name="time" class="form-control" value="{{ $row->time }}">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
								<label>Description</label>
								<input type="text" name="description" class="form-control" value="{{ $row->description }}">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
								<label>Medicine</label>
								<input type="text" name="medicine" class="form-control" value="{{ $row->medicine }}">
							</div>
						</div>
						<button type="submit" class="btn btn-warning">Update</button>
						<a href="{{ action('DoctorController@index') }}" class="btn btn-default">Back</a>
					</form>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
