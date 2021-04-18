@extends('layouts.app')
@section('title', 'Create Appointment')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-sm-2">
							<a href="{{ action('AdminController@future_appointment_page') }}" class="nodeco">
								<i class="fas fa-chevron-left"></i>
								Back
							</a>
						</div>
						<div class="col-sm-8 text-center">
							{{ __('Create Appointment') }}
						</div>
						<div class="col-sm-2"></div>
					</div>
				</div>
				<div class="card-body">
					{!! Form::open(['route' => 'admin.create_appointment.submit', 'method' => 'POST']) !!}
					<div class="form-group row">
						<div class="col-md-12">
							<h6>Admin {{ Auth::user()->fullName }}</h6>
							<input id="patient_id" type="hidden" class="form-control" name="patient_id" value="{{Auth::user()->id}}" placeholder="Patient ID" required autofocus>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-6">
							Date
							<div class="input-group mb-2">
								<input type="date" class="form-control" name="date" placeholder="Date">
							</div>
						</div>
						<div class="col-sm-6">
							Time
							<select name="time" class="form-control" Required>
								<option value="09:00:00">09:00 AM</option>
								<option value="10:00:00">10:00 AM</option>
								<option value="11:00:00">11:00 AM</option>
								<option value="12:00:00">12:00 PM</option>
								<option value="13:00:00">01:00 PM</option>
								<option value="14:00:00">02:00 PM</option>
								<option value="15:00:00">03:00 PM</option>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-12">
							Select a Doctor
							<select name="doctor_id" class="form-control" Required>
								@foreach($doctor as $d_row)
								<option value="{{ $d_row->id }}">{{ $d_row->first_name }} {{ $d_row->last_name }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-12">
							Select a Patient
							<select name="patient_id" class="form-control" Required>
								@foreach($patient as $p_row)
								<option value="{{ $p_row->id }}">{{ $p_row->first_name }} {{ $p_row->last_name }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-12">
							Provide a brief description of the ailment
							<textarea id="description" type="text" class="form-control" name="description" placeholder="Brief description" required>   </textarea>
						</div>
					</div>

					<div class="form-group row justify-content-center mb-0">
						<div class="col-md-6 text-center">
							<button type="submit" class="btn btn-primary">
								<i class="fas fa-user-plus"></i> Make Appointment
							</button>
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
