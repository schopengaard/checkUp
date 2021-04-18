@extends('layouts.app')
@section('title', 'Register Page')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card cardAtt">
                <div class="card-header cardHead">
					<div class="row">
						<div class="col-sm-6 text-left">
							{{ __('Register') }}
						</div>
                        <div class="col-sm-6 text-right">
                            <a href="{{ route('patient.login') }}" class="nodeco" style="color: #000;">
                                Already have an account? &nbsp
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
					</div>
				</div>

                <div class="card-body">
                    {!! Form::open(['route' => 'register.submit', 'method' => 'POST']) !!}
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
                            <input id="age" type="text" class="form-control" name="age" value="{{ old('age') }}" placeholder="Age" required autofocus>
                            @if ($errors->has('age'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('age') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col-sm-6">
                            <input id="care_card" type="text" class="form-control" name="care_card" value="{{ old('care_card') }}" placeholder="Care Card #" required>
                            @if ($errors->has('care_card'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('care_card') }}</strong>
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
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

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


                    <div class="form-group row justify-content-center mb-0">
                        <div class="text-center">
                            <button type="submit" class="btn mainColor3">
                                <i class="fas fa-user-plus"></i> Register
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
