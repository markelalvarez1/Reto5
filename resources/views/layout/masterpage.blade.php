<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ArepaAPP - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600;700&family=Open+Sans&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
     @yield('styles')

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-secondary top-bar wow fadeIn" data-wow-delay="0.1s">
        <div class="row align-items-center h-100">
            <div class="col-lg-4 text-center text-lg-start">
                <a href="index.html">
                    <h1 class="display-5 text-primary m-0">Arepapp</h1>
                </a>
            </div>
            <div class="col-lg-8 d-none d-lg-block">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="d-flex justify-content-end">
                            <div class="flex-shrink-0 btn-square bg-primary">
                                <i class="fa fa-phone-alt text-dark"></i>
                            </div>
                            <div class="ms-2">
                                <h6 class="text-primary mb-0">Pedidos</h6>
                                <span class="text-white">+58 000 000 0000</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex justify-content-end">
                            <div class="flex-shrink-0 btn-square bg-primary">
                                <i class="fa fa-envelope-open text-dark"></i>
                            </div>
                            <div class="ms-2">
                                <h6 class="text-primary mb-0">Correo</h6>
                                <span class="text-white">contacto@arepísima.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex justify-content-end">
                            <div class="flex-shrink-0 btn-square bg-primary">
                                <i class="fa fa-map-marker-alt text-dark"></i>
                            </div>
                            <div class="ms-2">
                                <h6 class="text-primary mb-0">Ubicación</h6>
                                <span class="text-white">Calle Sabor 123, Caracas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-secondary px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="nav-bar">
            <nav class="navbar navbar-expand-lg bg-primary navbar-dark px-4 py-lg-0">
                <h4 class="d-lg-none m-0">Menú</h4>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav me-auto">
                        <a href="{{route('products.index')}}" class="nav-item nav-link">{{__('nav.products')}}</a>
                        <a href="{{route('contact')}}" class="nav-item nav-link">{{__('nav.contact')}} </a>

                        <div class="nav-item dropdown">
                            <a href="#!" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">@auth {{auth()->user()->name}}  @else Usuario @endauth</a>
                            <div class="dropdown-menu bg-light m-0">
                                @auth
                                    <a href="#" class="dropdown-item"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{route('logout')}}" method="post" class="d-none">
                                        @csrf
                                    </form>
                                    <a href="#" class="dropdown-item">Mi perfil</a>
                                @else
                                    <a href="{{route('login')}}" class="dropdown-item">Login</a>
                                    <a href="{{route('register')}}" class="dropdown-item">Registro</a>
                                @endauth


                            </div>
                        </div>



                    </div>
                    <div class="d-none d-lg-flex ms-auto">
                        <a class="btn btn-square btn-dark ms-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-dark ms-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-dark ms-2" href="#!"><i class="fab fa-youtube"></i></a>
                    </div>
                    <div class="d-flex align-items-center ms-3">
                        <a href="{{ route('setLocale', 'es') }}" class="text-white me-2">ES</a>
                        <span class="text-white">|</span>
                        <a href="{{ route('setLocale', 'en') }}" class="text-white ms-2">EN</a>
                        <span class="text-white">|</span>
                        <a href="{{ route('setLocale', 'eu') }}" class="text-white ms-2">EU</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Navbar End -->

    <div class="container-fluid mt-5 px-5">
        @include('layout.messages')
        @yield('content')
    </div>


    {{--
    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 py-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Our Office</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-3">
                        <a class="btn btn-square btn-primary me-2" href="#!"><i class="fab fa-x-twitter"></i></a>
                        <a class="btn btn-square btn-primary me-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-primary me-2" href="#!"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-primary me-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="#!">About Us</a>
                    <a class="btn btn-link" href="#!">Contact Us</a>
                    <a class="btn btn-link" href="#!">Our Services</a>
                    <a class="btn btn-link" href="#!">Terms & Condition</a>
                    <a class="btn btn-link" href="#!">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Business Hours</h4>
                    <p class="mb-1">Monday - Friday</p>
                    <h6 class="text-light">09:00 am - 07:00 pm</h6>
                    <p class="mb-1">Saturday</p>
                    <h6 class="text-light">09:00 am - 12:00 pm</h6>
                    <p class="mb-1">Sunday</p>
                    <h6 class="text-light">Closed</h6>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Gallery</h4>
                    <div class="row g-2">
                        <div class="col-4">
                            <img class="img-fluid w-100" src="img/gallery-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid w-100" src="img/gallery-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid w-100" src="img/gallery-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid w-100" src="img/gallery-4.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid w-100" src="img/gallery-5.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid w-100" src="img/gallery-6.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright pt-5">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="fw-semi-bold" href="#!">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="fw-semi-bold" href="https://htmlcodex.com">HTML Codex</a>. Distributed by
                        <a class="fw-semi-bold" href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#!" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('lib/counterup/counterup.min.js')}}"></script>




    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>
