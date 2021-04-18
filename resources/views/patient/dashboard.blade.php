@extends('layouts.app')
@section('title', 'Patient Dashboard')
@section('topPart')
<div class="container mt-4">
	<div class="row justify-content-center">
		<!-- Profile Header -->
		@include('partials._patientHeader')
	</div>
</div>
@endsection
@section('content')
<div class="row justify-content-center">
	<div class="row col-sm-12 my-4">
		<div class="card-deck">
			<a class="nodeco card mainColor3" href="{{ route('patient.appointment_page') }}">
				<img class="card-img-top" src="imgs/patient/appointment.png" alt="Card image cap">
				<div class="card-body text-center">
					<h4 class="card-title">Appointments</h4>
					<h6 class="card-text" style="font-weight: normal;">Make an appointment or see your upcoming appointments</h6>
				</div>
			</a>
			<a class="nodeco card mainColor3" href="{{ route('patient.doctor_page') }}">
				<img class="card-img-top" src="imgs/patient/doctor.png" alt="Card image cap">
				<div class="card-body text-center">
					<h4 class="card-title">Search Doctors</h4>
					<h6 class="card-text" style="font-weight: normal;">Look up doctors based on area and specialty</h6>
				</div>
			</a>
			<a class="nodeco card mainColor3" href="{{ route('patient.medicine_reminder_page') }}">
				<img class="card-img-top" src="imgs/patient/medicine.png" alt="Card image cap">
				<div class="card-body text-center">
					<h4 class="card-title">Medicine Reminder</h4>
					<h6 class="card-text" style="font-weight: normal;">Read what the doctor recommends with your prescription</h6>
				</div>
			</a>
			<a class="nodeco card mainColor3" href="{{ route('patient.medical_history_page') }}">
				<img class="card-img-top" src="imgs/patient/medical-history.png" alt="Card image cap">
				<div class="card-body text-center">
					<h4 class="card-title">Medical History</h4>
					<h6 class="card-text" style="font-weight: normal;">Details on past appointments</h6>
				</div>
			</a>
		</div>
	</div>
	@include('partials._piclicense')
</div>
@endsection
@section('secondContent')

@endsection
@section('stylesheets')
@endsection
