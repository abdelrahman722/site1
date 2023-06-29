<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $setting->title }}</title>
    <meta content name="description">
    <meta content name="keywords">

    <!-- Favicons -->
    <link href="{{ url('/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ url('/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top @if (strpos(url()->full(), 'project'))header-inner-pages @endif">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="{{ url('/') }}">{{ $setting->title }}</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="#team">Team</a></li>
                    <li class="mx-3">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm"aria-label="Recipient's username"
                                aria-describedby="button-addon2">
                            <button class="btn btn-sm btn-outline-primary" type="button" id="button-addon2">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>{{ $setting->title }}</h3>
                        <p>
                            {{ $setting->address }} <br><br>
                            <strong>Phone:</strong> {{ $setting->phone1 }}<br><br>
                            <strong>Phone:</strong> {{ $setting->phone2 }}<br><br>
                            <strong>Phone:</strong> {{ $setting->phone3 }}<br><br>
                            <strong>Email:</strong> {{ $setting->email }}<br><br>
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3410.9113914201844!2d29.97305311514395!3d31.25087618145958!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzHCsDE1JzAzLjIiTiAyOcKwNTgnMzAuOSJF!5e0!3m2!1sen!2seg!4v1688038619396!5m2!1sen!2seg" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            @foreach ($services as $service)
                                <li>
                                    <i class="bx bx-chevron-right"></i> {{ $service->title }}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                        <div class="social-links mt-3">
                            <a href="{{ $setting->twitter }}" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="{{ $setting->facbook }}" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="{{ $setting->instagram }}" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="{{ $setting->skype }}" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="{{ $setting->linkedin }}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>site</span></strong>. All
                Rights Reserved
            </div>
            <div class="credits">
                Designed by
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="{{ url('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ url('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ url('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('assets/js/main.js') }}"></script>

</body>

</html>