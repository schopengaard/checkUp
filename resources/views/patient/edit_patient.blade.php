@extends('layouts.app')
@section('title', 'Update Profile')
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
				<div class="card-header">
					<div class="row">
						<div class="col-sm-2">
							<a href="{{ action('PatientController@index') }}" class="nodeco">
								<i class="fas fa-chevron-left"></i>
								Back
							</a>
						</div>
						<div class="col-sm-8 text-center">
							{{ __('Update Profile') }}
						</div>
						<div class="col-sm-2"></div>
					</div>
				</div>
				<div class="card-body">
					@foreach($patient as $row)
					<form action="{{ action('PatientController@update_patient', $row->id) }}" method="post">
						@csrf
						@method('PATCH')
						<div class="form-group row">
							<div class="col-md-6">
								<label>First Name</label>
								<input type="text" name="first_name" class="form-control" value="{{ $row->first_name }}">
							</div>
							<div class="col-md-6">
								<label>Last Name</label>
								<input type="text" name="last_name" class="form-control" value="{{ $row->last_name }}">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label>Username</label>
								<input type="text" name="username" class="form-control" value="{{ $row->username }}">
							</div>
							<div class="col-md-6">
								<label>Email</label>
								<input type="text" name="email" class="form-control" value="{{ $row->email }}">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
								<label>Password</label>
								<input type="password" name="password" class="form-control" placeholder="{{ 'Insert a new password?' }}">
								@if ($errors->has('password'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label>Age</label>
								<input type="text" name="age" class="form-control" value="{{ $row->age }}">
							</div>
							<div class="col-md-6">
								<label>Care Card</label>
								<input type="text" name="care_card" class="form-control" value="{{ $row->care_card }}">
							</div>
						</div>
						<button type="submit" class="btn btn-warning mt-3">Update</button>
					</form>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection