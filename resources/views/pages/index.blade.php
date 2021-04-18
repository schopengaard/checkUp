@extends('layouts.app')

@section('title', 'Home Page')
@section('topPart')
@endsection
@section('content')
@csrf
<div class="container col-sm-12 py-5 text-white row">
	<div class="col-sm-4 text-center">
		<img class="img-fluid" src="imgs/logo.png" alt="..." style="width: 80%;">
	</div>
	<div class="col-sm-8">
		<h1 class="display-4">Welcome to checkUp!</h1>
		<p class="lead px-2">Your healthcare online service</p>
		<p class="px-2">You can look up doctors, book appointments, pay for bills, and get reminders of your prescription!</p>
		<a class="btn my-4 px-4 mainColor3" style="border-radius: 20px" href="{{ route('register') }}">Start Now</a>
	</div>
</div>
@endsection
