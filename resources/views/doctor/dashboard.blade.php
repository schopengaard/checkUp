@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('topPart')
<div class="container mt-4">
	<div class="row justify-content-center">
		<!-- Profile Header -->
		@include('partials._doctorHeader')
	</div>
</div>
@endsection
@section('content')
<div class="row justify-content-center">
	<div class="row col-sm-12 my-4">
		<div class="card-deck">
			<a class="nodeco card mainColor3" href="{{ route('doctor.future_appointment_page') }}">
				<img class="card-img-top" src="imgs/patient/appointment.png" alt="Card image cap">
				<div class="card-body text-center">
					<h4 class="card-title">Upcoming Appointments</h4>
					<h6 class="card-text" style="font-weight: normal;">See your upcoming appointments</h6>
				</div>
			</a>
			<a class="nodeco card mainColor3" href="{{ route('doctor.past_appointment_page') }}">
				<img class="card-img-top" src="imgs/patient/medical-history.png" alt="Card image cap">
				<div class="card-body text-center">
					<h4 class="card-title">Past Appointments</h4>
					<h6 class="card-text" style="font-weight: normal;">Review details on past appointments</h6>
				</div>
			</a>
			<a class="nodeco card mainColor3" href="{{ route('doctor.patient_page') }}">
				<img class="card-img-top" src="imgs/patient/patient.png" alt="Card image cap">
				<div class="card-body text-center">
					<h4 class="card-title">Search Patients</h4>
					<h6 class="card-text" style="font-weight: normal;">Look up patient info</h6>
				</div>
			</a>
			<a class="nodeco card mainColor3" href="{{ route('doctor.schedule_page') }}">
				<img class="card-img-top" src="imgs/patient/schedule.png" alt="Card image cap">
				<div class="card-body text-center">
					<h4 class="card-title">Update Schedule</h4>
					<h6 class="card-text" style="font-weight: normal;">Change your availability</h6>
				</div>
			</a>
		</div>
	</div>
	@include('partials._piclicense')
</div>
@endsection
