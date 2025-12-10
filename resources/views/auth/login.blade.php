<!DOCTYPE html>
<html lang="en">
<head>
	<title>Emoodji - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" {{ asset('/masuk/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('/masuk/fonts/font-awesome-4.7.0/css/font-awesome.min.css ') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('/masuk/fonts/Linearicons-Free-v1.0.0/icon-font.min.css ') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('/masuk/vendor/animate/animate.css ') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href=" {{ asset('/masuk/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('/masuk/vendor/animsition/css/animsition.min.css ') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('/masuk/vendor/select2/select2.min.css ') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('/masuk/vendor/daterangepicker/daterangepicker.css ') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('/masuk/css/util.css ') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/masuk/css/main.css ') }}">
<!--===============================================================================================-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(masuk/images/bg-02.jpg);">
					<span class="login100-form-title-1">
						LOG IN
					</span>
				</div>

				{{-- <form class="login100-form validate-form" action="{{ route('auth') }}" method="POST"> --}}
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
				@csrf

					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Email</span>
						<input placeholder="Masukkan email" id="email" class="block mt-1 w-full input100" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input placeholder="Masukkan password" id="password" class="block mt-1 w-full input100" type="password" name="password" required autocomplete="current-password" >
						<span class="focus-input100"></span>
					</div>

					{{-- <div class="block mt-4">
						<label for="remember_me" class="flex items-center">
							<x-checkbox id="remember_me" name="remember" />
							<span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
						</label>
					</div> --}}

					<div class="flex-sb-m w-full p-b-30">
						@if (Route::has('password.request'))
							<a class="txt1 underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
								{{ __('Forgot your password?') }}
							</a>
						@endif
						{{-- <div>
							<a href="{{ route('password.request') }}" class="txt1">
								Lupa Password?
							</a>
						</div> --}}
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn " type="submit" name="submit">
							{{ __('Log in') }}
						</button>

						{{-- <a href="auth/redirect" class="Regis100-form-btn">
							<i class="fab fa-google"></i>
							<span class="ml-2">Login with Google</span>
						</a> --}}

					</div>

				</form>

				<div>
				
				</div>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src=" {{ asset('/masuk/vendor/jquery/jquery-3.2.1.min.js ') }}"></script>
<!--===============================================================================================-->
	<script src=" {{ asset('/masuk/vendor/animsition/js/animsition.min.js ') }}"></script>
<!--===============================================================================================-->
	<script src=" {{ asset('/masuk/vendor/bootstrap/js/popper.js ') }}"></script>
	<script src=" {{ asset('/masuk/vendor/bootstrap/js/bootstrap.min.js ') }}"></script>
<!--===============================================================================================-->
	<script src=" {{ asset('/masuk/vendor/select2/select2.min.js ') }}"></script>
<!--===============================================================================================-->
	<script src=" {{ asset('/masuk/vendor/daterangepicker/moment.min.js ') }}"></script>
	<script src=" {{ asset('/masuk/vendor/daterangepicker/daterangepicker.js ') }}"></script>
<!--===============================================================================================-->
	<script src=" {{ asset('/masuk/vendor/countdowntime/countdowntime.js ') }}"></script>
<!--===============================================================================================-->
	<script src=" {{ asset('/masuk/js/main.js') }}"></script>

</body>
</html>