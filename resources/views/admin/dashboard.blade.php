@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('topPart')
<div class="container mt-4">
	<div class="row justify-content-center">
		<!-- Profile Header -->
		@include('partials._adminHeader')
	</div>
</div>
@endsection
@section('content')
<div class="row justify-content-center">
	<div class="row col-sm-12 my-4">
		<div class="card-deck">
			<a class="nodeco card mainColor3" href="{{ route('admin.patient_page') }}">
				<img class="card-img-top" src="imgs/patient/patient.png" alt="Card image cap">
				<div class="card-body text-center">
					<h4 class="card-title">Patients</h4>
					<h6 class="card-text" style="font-weight: normal;"></h6>
				</div>
			</a>
			<a class="nodeco card mainColor3" href="{{ route('admin.doctor_page') }}">
				<img class="card-img-top" src="imgs/patient/doctor.png" alt="Card image cap">
				<div class="card-body text-center">
					<h4 class="card-title">Doctors</h4>
					<h6 class="card-text" style="font-weight: normal;"></h6>
				</div>
			</a>
			<a class="nodeco card mainColor3" href="{{ route('admin.future_appointment_page') }}">
				<img class="card-img-top" src="imgs/patient/appointment.png" alt="Card image cap">
				<div class="card-body text-center">
					<h4 class="card-title">Future Appointments</h4>
					<h6 class="card-text" style="font-weight: normal;"></h6>
				</div>
			</a>
		</div>
		<div class="card-deck mt-4">
			<a class="nodeco card mainColor3" href="{{ route('admin.bill_page') }}">
				<img class="card-img-top" src="imgs/patient/bill.png" alt="Card image cap">
				<div class="card-body text-center">
					<h4 class="card-title">Bill</h4>
					<h6 class="card-text" style="font-weight: normal;"></h6>
				</div>
			</a>
			<a class="nodeco card mainColor3" href="{{ route('admin.medicine_page') }}">
				<img class="card-img-top" src="imgs/patient/medicine.png" alt="Card image cap">
				<div class="card-body text-center">
					<h4 class="card-title">Medicine</h4>
					<h6 class="card-text" style="font-weight: normal;"></h6>
				</div>
			</a>
			<a class="nodeco card mainColor3" href="{{ route('admin.past_appointment_page') }}">
				<img class="card-img-top" src="imgs/patient/appointment.png" alt="Card image cap">
				<div class="card-body text-center">
					<h4 class="card-title">Past Appointments</h4>
					<h6 class="card-text" style="font-weight: normal;"></h6>
				</div>
			</a>
		</div>
	</div>
	@include('partials._piclicense')
</div>
@endsection
