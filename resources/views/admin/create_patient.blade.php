@extends('layouts.app')
@section('title', 'Create Patient')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-sm-2">
							<a href="{{ action('AdminController@patient_page') }}" class="nodeco">
								<i class="fas fa-chevron-left"></i>
								Back
							</a>
						</div>
						<div class="col-sm-8 text-center">
							{{ __('Create Patient') }}
						</div>
						<div class="col-sm-2"></div>
					</div>
				</div>

				<div class="card-body">
					{!! Form::open(['route' => 'admin.create_patient.submit', 'method' => 'POST']) !!}
					<div class="form-group row">
						<div class="col-md-6">
							<input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required autofocus>
							@if ($errors->has('first_name'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('first_name') }}</strong>
							</span>
							@endif
						</div>
						<div class="col-sm-6">
							<input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required>
							@if ($errors->has('last_name'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('last_name') }}</strong>
							</span>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-6">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text">@</div>
								</div>
								<input type="text" class="form-control" name="username" placeholder="Username">
								@if ($errors->has('username'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('username') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="col-sm-6">
							<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>
							@if ($errors->has('email'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-6">
							<input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

							@if ($errors->has('password'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
							@endif
						</div>
						<div class="col-sm-6">
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-6">
							<input id="age" type="text" class="form-control" name="age" placeholder="Age" required>
						</div>
						<div class="col-sm-6">
							<input id="care_card" type="text" class="form-control" name="care_card" placeholder="Care Card #" required>
						</div>
					</div>

					<div class="form-group row justify-content-center mb-0">
						<div class="col-md-6 text-center">
							<button type="submit" class="btn btn-primary">
								<i class="fas fa-user-plus"></i> Add Patient
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
