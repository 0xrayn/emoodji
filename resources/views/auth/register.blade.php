<!DOCTYPE html>
<html lang="en">

<head>
    <title>Emoodji - Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('/masuk/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/masuk/fonts/font-awesome-4.7.0/css/font-awesome.min.css ') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/masuk/fonts/Linearicons-Free-v1.0.0/icon-font.min.css ') }}">
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
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(masuk/images/bg-01.jpg);">
                    <span class="login100-form-title-1">
                        REGISTER
                    </span>
                </div>

                <form class="login100-form validate-form" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Nama</span>
                        <input placeholder="Masukkan alamat email" id="name" class="block mt-1 w-full input100"
                            type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                        <span class="label-input100">Email</span>
                        <input placeholder="Masukkan alamat email" id="email" class="block mt-1 w-full input100"
                            type="email" name="email" :value="old('email')" required autocomplete="username">
                        <span class="focus-input100"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Gender is required">
                        <span class="label-input100">Jenis Kelamin</span>
                        <select id="gender" class="block mt-1 w-full input100" name="gender">
                            <option value="" disabled selected>Pilih jenis kelamin</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        <span class="focus-input100"></span>
                    </div>


                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">Password</span>
                        <input placeholder="Masukkan password" id="password" class="block mt-1 w-full input100"
                            type="password" name="password" required autocomplete="new-password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">Konfirmasi Password</span>
                        <input placeholder="Masukkan ulang password" id="password_confirmation"
                            class="block mt-1 w-full input100" type="password" name="password_confirmation" required
                            autocomplete="new-password">
                        <span class="focus-input100"></span>
                    </div>



                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required />

                                    <div class="ms-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' =>
                                                '<a target="_blank" href="' .
                                                route('terms.show') .
                                                '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                __('Terms of Service') .
                                                '</a>',
                                            'privacy_policy' =>
                                                '<a target="_blank" href="' .
                                                route('policy.show') .
                                                '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                __('Privacy Policy') .
                                                '</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-end mb-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="submit">
                            {{ __('Register') }}
                        </button>
                        @if (session()->has('success') || session()->has('error'))
                            {{-- <button class="">
							Login
						</button> --}}
                            <a href="{{ route('login') }}" class="Regis100-form-btn">Login</a>
                        @endif
                    </div>
                </form>
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
