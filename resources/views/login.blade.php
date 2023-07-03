<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ url('Login/images/icons/favicon.ico') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ url('Login/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('Login/vendor/animate/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('Login/vendor/css-hamburgers/hamburgers.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('Login/vendor/select2/select2.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('Login/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('Login/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{ url('Login/images/img-01.png') }}" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="{{ route('signin') }}">
                    @csrf
					<span class="login100-form-title">
						Admin Login
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div style="color: red;padding-bottom:10px">
						@error('email')
							{{ $message }}
						@enderror
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div style="color: red">
						@error('password')
							{{ $message }}
						@enderror
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="{{ url('Login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ url('Login/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ url('Login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ url('Login/vendor/select2/select2.min.js') }}"></script>
	<script src="{{ url('Login/vendor/tilt/tilt.jquery.min.js') }}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="{{ url('js/main.js') }}"></script>
    <!--===============================================================================================-->

</body>
</html>