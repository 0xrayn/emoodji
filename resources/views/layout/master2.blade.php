<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('tittle')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href=" {{ asset('/img/favicon.ico ') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href=" {{ asset('/lib/animate/animate.min.css ') }}" rel="stylesheet">
    <link href=" {{ asset('/lib/owlcarousel/assets/owl.carousel.min.css ') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href=" {{ asset('/css/bootstrap.min.css ') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href=" {{ asset('/css/style.css ') }}" rel="stylesheet">
    <link rel="stylesheet" href=" {{ asset('/music/style.css ') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    @yield('css')
    {{-- DYNAMIC THEME BY GENDER: paste this after your stylesheet links in <head> --}}
    @php
        // Pastikan auth() ada; jika layout dipakai juga untuk guest, gunakan null safe
        $gender = auth()->check() ? auth()->user()->gender : null;
    @endphp

    @if ($gender === 'male')
        <style>
            :root {
                /* Dominant blue (male) - not everything, just primary/accents */
                --primary: #355EFC;
                /* main blue */
                --accent: #6B8CFF;
                /* lighter blue used for hover/gradients */
                --light: #DFE4FD;
                /* light background accents */
                --dark: #011A41;
                /* dark text */
                --highlight: #BBD3FF;
                /* subtle highlight */
                --gender-color: var(--primary);
                --primary-rgb: 53,
                    94,
                    252;
            }

            .footer {
                background-color: var(--dark) !important;
                color: var(--light) !important;
            }

            .footer .btn-link {
                color: var(--light) !important;
            }

            .footer .btn-link:hover {
                color: var(--primary) !important;
            }

            .text-primary {
                color: var(--primary) !important;
            }

            .btn-primary {
                background-color: var(--primary) !important;
                border-color: var(--primary) !important;
            }

            .btn-primary:hover {
                background-color: var(--accent) !important;
                border-color: var(--accent) !important;
            }
        </style>
    @elseif($gender === 'female')
        <style>
            :root {
                /* Dominant pink (female) */
                --primary: #FF4DA6;
                /* main pink */
                --accent: #FF85C4;
                /* lighter pink */
                --light: #FFEAF3;
                /* light background accents */
                --dark: #3D1230;
                /* dark text variant */
                --highlight: #FFD6EB;
                --gender-color: var(--primary);
                --primary-rgb: 255,
                    77,
                    166;
            }

            .footer {
                background-color: var(--dark) !important;
                color: var(--light) !important;
            }

            .footer .btn-link {
                color: var(--light) !important;
            }

            .footer .btn-link:hover {
                color: var(--primary) !important;
            }

            .text-primary {
                color: var(--primary) !important;
            }

            .btn-primary {
                background-color: var(--primary) !important;
                border-color: var(--primary) !important;
            }

            .btn-primary:hover {
                background-color: var(--accent) !important;
                border-color: var(--accent) !important;
            }
        </style>
    @else
        <style>
            :root {
                /* Default (no gender) => yellow warm theme */
                --primary: #FFD166;
                /* main yellow */
                --accent: #FFE08A;
                /* lighter yellow */
                --light: #FFF6DF;
                /* light background accents */
                --dark: #a88512;
                /* dark text variant */
                --highlight: #FFF0B3;
                --gender-color: var(--primary);
                --primary-rgb: 255,
                    209,
                    102;
            }

            .footer {
                background-color: var(--dark) !important;
                color: var(--light) !important;
            }

            .footer .btn-link {
                color: var(--light) !important;
            }

            .footer .btn-link:hover {
                color: var(--primary) !important;
            }

            .text-primary {
                color: var(--primary) !important;
            }

            .btn-primary {
                background-color: var(--primary) !important;
                border-color: var(--primary) !important;
            }

            .btn-primary:hover {
                background-color: var(--accent) !important;
                border-color: var(--accent) !important;
            }
        </style>
    @endif


</head>

<body>


    <style>
        .page-header {
            padding-top: 12rem;
            padding-bottom: 6rem;
            background: url("{{ asset('img/' . trim($__env->yieldContent('header')) . '.jpg') }}") top left no-repeat;
            background-size: cover;
        }
    </style>

    <!-- Spinner Start -->
    <div id="spinner"
        class="bg-white show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="px-0 container-fluid fixed-top wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            {{-- <div class="px-5 col-lg-6 text-start">
                <small><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</small>
                <small class="ms-4"><i class="fa fa-clock text-primary me-2"></i>9.00 am - 9.00 pm</small>
            </div>
            <div class="px-5 col-lg-6 text-end">
                <small><i class="fa fa-envelope text-primary me-2"></i>info@example.com</small>
                <small class="ms-4"><i class="fa fa-phone-alt text-primary me-2"></i>+012 345 6789</small>
            </div> --}}
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="{{ route('index') }}" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="m-0 display-5 text-primary">Emoodji</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="p-4 navbar-nav ms-auto p-lg-0">
                    <a href="{{ route('index') }}" class="nav-item nav-link">Home</a>

                    <div class="nav-item dropdown ">
                        <a href="#" class="nav-link dropdown-toggle @yield('nav_fitur')"
                            data-bs-toggle="dropdown ">Fitur</a>
                        <div class="m-0 dropdown-menu border-light">

                            @auth
                                <a href="{{ route('permainan') }}" class="dropdown-item">Permainan</a>
                                <a href="/chatify" class="dropdown-item">Chat</a>
                            @endauth

                            <a href="{{ route('informasi') }}" class="dropdown-item">Informasi</a>
                            <a href="{{ route('team') }}" class="dropdown-item">Team Member</a>
                            <a href="{{ route('masukan') }}" class="dropdown-item">Masukan</a>
                            {{-- <a href="404.html" class="dropdown-item">404 Page</a> --}}
                        </div>
                    </div>

                    @guest
                        <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                        <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
                    @endguest
                    {{-- <a href="{{ route('tes') }}" class="nav-item nav-link @yield('nav_tes')">Tes</a> --}}
                    @auth
                        <a href="{{ route('assessment') }}" class="nav-item nav-link @yield('nav_prediksi')">Assessment</a>
                        <a href="{{ route('profile.show') }}" class="nav-item nav-link @yield('nav_profil')">Profil</a>
                        <a href="{{ route('logout') }}" class="nav-item nav-link" id="logout-link">Logout</a>
                    @endauth

                    <script>
                        document.getElementById('logout-link').addEventListener('click', function(event) {
                            event.preventDefault();

                            fetch("{{ route('logout') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            }).then(response => {
                                if (response.ok) {
                                    // Redirect to the login page or any other page after successful logout
                                    window.location.href = '/';
                                }
                            }).catch(error => {
                                console.error('Error:', error);
                            });
                        });
                    </script>

                    {{-- <a href="contact.html" class="nav-item nav-link">Contact</a> --}}
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="mb-5 container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="mb-4 display-3 animated slideInDown">@yield('page') <button class="btn btn-primary"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                    aria-controls="offcanvasRight">
                    <i class="fa fa-play" aria-hidden="true"></i>
                </button>

            </h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    @if (Route::currentRouteName() !== 'prediksi.index' && Route::currentRouteName() !== 'tes')
                        <li class="breadcrumb-item">Fitur</li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">@yield('page')</li>
                </ol>

            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Musik</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="main">
                <div class="wrapper">
                    <div class="top-bar">
                        <i class="material-icons">expand_more</i>
                        <span>Now Playing</span>
                        <i class="material-icons">more_horiz</i>
                    </div>
                    <div class="img-area">
                        <img src="" alt="">
                    </div>
                    <div class="song-details">
                        <p class="name"></p>
                        <p class="artist"></p>
                    </div>
                    <div class="progress-area">
                        <div class="progress-bar">
                            <audio id="main-audio" src=""></audio>
                        </div>
                        <div class="song-timer">
                            <span class="current-time">0:00</span>
                            <span class="max-duration">0:00</span>
                        </div>
                    </div>
                    <div class="controls">
                        <i id="repeat-plist" class="material-icons" title="Playlist looped">repeat</i>
                        <i id="prev" class="material-icons">skip_previous</i>
                        <div class="play-pause">
                            <i class="material-icons play">play_arrow</i>
                        </div>
                        <i id="next" class="material-icons">skip_next</i>
                        <i id="more-music" class="material-icons">queue_music</i>
                    </div>
                    <div class="music-list">
                        <div class="header">
                            <div class="row">
                                <i class= "list material-icons">queue_music</i>
                                <span>Music list</span>
                            </div>
                            <i id="close" class="material-icons">close</i>
                        </div>
                        <ul>
                            <!-- here li list are coming from js -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src=" {{ asset('/music/js/music-list.js ') }}"></script>
    <script src="{{ asset('/music/js/script.js ') }}"></script>


    @yield('content')

    <!-- Footer Start -->
    <div class="py-5 mt-5 container-fluid text-light footer wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="mb-4 text-white">Informasi Kontak</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Denpasar Raya No. 6, Kuningan,
                        Jakarta Selatan</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 81234567890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>Emoodji@gmail.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="mb-4 text-white">Fitur - Fitur</h4>
                    <a class="btn btn-link" href="{{ route('assessment') }}">Assesment</a>
                    <a class="btn btn-link" href="{{ route('permainan') }}">Permainan</a>
                    <a class="btn btn-link" href="{{ route('informasi') }}">Informasi</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="mb-4 text-white">Support Us</h4>
                    <a class="btn btn-link" href="{{ route('team') }}">Tim Pengembang</a>
                    <a class="btn btn-link" href="{{ route('masukan') }}">Saran dan Masukan</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="mb-4 text-white">Subscribe</h4>
                    <p>Subscribe untuk menerima update terbaru.</p>
                    <div class="position-relative w-100">
                        <form action="{{ route('subscribe') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input class="py-3 bg-white border-0 form-control w-100 ps-4 pe-5" type="email"
                                placeholder="Email" name="email" id="email">
                            <button type="submit"
                                class="top-0 py-2 mt-2 btn btn-primary position-absolute end-0 me-2">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="py-4 container-fluid copyright">
        <div class="container">
            <div class="row">
                <div class="mb-3 text-center col-md-6 text-md-start mb-md-0">
                    &copy; Emoodji, All Right Reserved.
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src=" {{ asset('/lib/wow/wow.min.js ') }}"></script>
    <script src=" {{ asset('/lib/easing/easing.min.js ') }}"></script>
    <script src=" {{ asset('/lib/waypoints/waypoints.min.js ') }}"></script>
    <script src=" {{ asset('/lib/owlcarousel/owl.carousel.min.js ') }}"></script>
    <script src=" {{ asset('/lib/counterup/counterup.min.js ') }}"></script>

    <!-- Template Javascript -->
    <script src=" {{ asset('/js/main.js ') }}"></script>
    {{-- @yield('js') --}}
</body>

</html>
