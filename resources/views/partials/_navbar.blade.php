<nav class="navbar navbar-expand-md navbar-light bg-light navbar-laravel">
	<div class="container">
		<a class="navbar-brand" class="pull-left" href="{{ url('/') }}">
			<img class="img-responsive2" src="/imgs/logo.png" style="width: 20px;">
			checkUp
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- Left Side Of Navbar -->


			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ml-auto">
				<!-- Authentication Links -->
				@guest
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						Login <span class="caret"></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<!-- Patient Login -->
						<a class="dropdown-item" href="{{ route('patient.login') }}">
							Patient Login
						</a>

						<div class="dropdown-divider"></div>

						<!-- Doctor Login -->
						<a class="dropdown-item" href="{{ route('doctor.login') }}">
							Doctor Login
						</a>

						<div class="dropdown-divider"></div>

						<!-- Admin Login -->
						<a class="dropdown-item" href="{{ route('admin.login') }}">
							Admin Login
						</a>
					</div>
				</li>

				<li class="nav-item">
					@if (Route::has('register'))
					<a class="nav-link" href="{{ route('register') }}">Register</a>
					@endif
				</li>
				@else
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						{{ Auth::user()->fullName }} </script> <span class="caret"></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<!-- User Profile Link -->
						<a class="dropdown-item" href="{{ route('patient.dashboard') }}">
							<i class="fas fa-user"></i> Dashboard
						</a>

						<div class="dropdown-divider"></div>

						<!-- Logout Link -->
						<a class="dropdown-item" href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						<i class="fas fa-sign-out-alt"></i> Logout
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</div>
			</li>
			@endif
		</ul>
	</div>
</div>
</nav>
