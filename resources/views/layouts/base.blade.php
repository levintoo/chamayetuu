<!doctype html>
<html lang="zxx">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Bnker. - Banking and Loan </title>

    <link rel="shortcut icon" href="{{ asset('assets/home/images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/home/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/style.css') }}">
    @livewireStyles
<body>
<!-- PreLoader -->
{{--<div id="preloader">--}}
{{--    <div id="status">--}}
{{--        <div class="spinner"></div>--}}
{{--    </div>--}}
{{--</div>--}}
<!--Preloader-->

<!-- Header -->
<div class="navbar-area">
    <div class="acavo-responsive-nav">
        <!-- Container -->
        <div class="container">
            <div class="acavo-responsive-menu">
                <div class="logo">
                    <a href="/">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
                    </a>
                </div>
            </div>
        </div>
        <!-- /Container -->
    </div>
    <div class="acavo-nav">
        <!-- Container -->
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="/" class="nav-link active">Home</a>
                        </li>

                        <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About Us</a>
                        </li>

                        <li class="nav-item"><a href="{{ route('portfolio') }}" class="nav-link">Portfolio</a>
                        </li>

                        <li class="nav-item"><a href="#" class="nav-link">Pages <i
                                    class='las la-angle-down'></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a href="faq.html" class="nav-link">FAQ</a></li>
                                <li class="nav-item"><a href="team.html" class="nav-link">Team</a></li>
                                <li class="nav-item"><a href="{{ route('blog') }}" class="nav-link">Blog</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Auth Page <i
                                            class='las la-angle-right'></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="login.html" class="nav-link">Login</a></li>
                                        <li class="nav-item"><a href="signup.html" class="nav-link">Sing Up</a></li>
                                        <li class="nav-item"><a href="recover.html" class="nav-link">Recover</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="pricing.html" class="nav-link">Pricing</a></li>
                                <li class="nav-item"><a href="404.html" class="nav-link">404</a></li>
                                <li class="nav-item"><a href="coming-soon.html" class="nav-link">Coming Soon</a>
                                </li>
                                <li class="nav-item"><a href="loan-calculation.html" class="nav-link">Loan
                                        Calculation</a></li>
                                <li class="nav-item"><a href="loans.html" class="nav-link">Loan Form</a></li>
                                <li class="nav-item"><a href="open-account.html" class="nav-link">Open Account</a>
                                </li>
                                <li class="nav-item"><a href="privacy-policy.html" class="nav-link">Privacy
                                        Policy</a></li>
                                <li class="nav-item"><a href="testimonials.html" class="nav-link">Testimonials</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a>
                        </li>

                        <li class="nav-item"><a href="" class="nav-link"></a>
                        </li>
                        <span class="d-flex align-items-center">
                    <a href="{{ route('dashboard') }}" class="btn theme-btn-1 rel-btn">
                        @if(Route::has('login'))
                            @auth
                                @if(Auth::user()->utype === 'ADM')
                                    Admin
                                @elseif(Auth::user()->utype === 'SEC')
                                    Secretary
                                @else
                                    Dashboard
                                @endif
                            @else
                                Get started
                            @endif
                        @endif
                    </a>
                    </span>
                    </ul>
                    <div class="others-option d-flex align-items-center">
                        <div class="option-item">
                            <form class="search-box">
                                <input type="text" class="input-search" placeholder="Search for anything">
                                <button type="submit"><i class="uil uil-search-alt"></i></button>
                            </form>
                        </div>
                        <div class="option-item">
                            <a href="" class="btn theme-btn-1">Get
                                Started <i class="las la-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- /Container -->
    </div>
    <div class="others-option-for-responsive">
        <!-- Container -->
        <div class="container">
            <div class="dot-menu">
                <div class="inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>
            <!-- Container -->
            <div class="container">
                <div class="option-inner">
                    <div class="others-option">
                        <div class="option-item">
                            <form class="search-box">
                                <input type="text" class="input-search" placeholder="Search for anything">
                                <button type="submit"><i class="flaticon-loupe"></i></button>
                            </form>
                        </div>

                        <div class="option-item">
                            <a href="contact.html" class="btn theme-btn-1"><i class="las la-angle-right"></i>Get
                                Started</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Container -->
        </div>
        <!-- /Container -->
    </div>
</div>


{{$slot}}


<div class="cta-area">
    <!-- Container -->
    <div class="container">
        <!-- row -->
        <div class="row align-items-center">
            <!-- col -->
            <div class="col-lg-12">
                <div class="get-start-box">
                    <!-- col -->
                    <div class="col-lg-8">
                        <div class="section-heading">
                            <h5 class="section__meta text-white">#get in touch</h5>
                            <h2 class="section__title">Ready to get started ?</h2>
                            <p class="section__sub">Speak to a Bnker specialist at (800-123-1234)</p>
                        </div>
                    </div>
                    <!-- /col -->
                    <!-- col -->
                    <div class="col-lg-4">
                        <div class="button-shared text-end">
                            <a href="{{ route('contact') }}" class="btn cta-btn">
                                Request Call Back <span class="la la-caret-right"></span>
                            </a>
                        </div>
                    </div>
                    <!-- /col -->
                </div>
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /Container -->
</div>
<!-- /Cta -->

<!-- Footer -->
<footer class="footer-style bg-gray-100 pt-200">
    <!-- Container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-xl-3 col-lg-3 col-md-4">
                <div class="footer-logo">
                    <a href="/"><img src="{{ asset('assets/images/logo.png') }}" alt=""></a>
                </div>
            </div>
            <!-- /col -->
            <!-- col -->
            <div class="col-xl-9 col-lg-9  col-md-8 mb-30">
                <div class="footer-top-wrapper">
                    <ul class="footer-top-link text-end">
                        <li><a href="#">Layouts </a></li>
                        <li><a href="#"> Pages</a></li>
                        <li><a href="#">Work</a></li>
                        <li><a href="{{route('blog')}}">Blog </a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                    </ul>
                </div>
            </div>
            <!-- /col -->
            <!-- col -->
        </div>
        <!-- /row -->
        <div class="footer-middle-area mt-30 pb-30 pt-60">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-wrapper mb-30">
                        <h3 class="footer-title">About Us</h3>
                        <div class="footer-text">
                            <p>Lorem ipsum dolor sit amet, consect etuer adipiscing elit, sed diam nonu mmy nibh
                                euis </p>
                        </div>
                        <div class="footer-icon">
                            <a href="#"><i class="uil uil-facebook-f"></i></a>
                            <a href="#"><i class="uil uil-twitter"></i></a>
                            <a href="#"><i class="uil uil-instagram-alt"></i></a>
                            <a href="#"><i class="uil uil-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-wrapper mb-30">
                        <h3 class="footer-title">Services</h3>
                        <div class="footer-link">
                            <ul>
                                <li><a href="about.html">Conditions</a></li>
                                <li><a href="our-history.html">Terms of Use</a></li>
                                <li><a href="about.html">Our Services</a></li>
                                <li><a href="team.html">New Guests List</a></li>
                                <li><a href="about.html">The Team List</a></li>
                            </ul>
                        </div>
                        <div></div>
                    </div>
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-wrapper mb-30">
                        <h3 class="footer-title">Useful Links</h3>
                        <div class="footer-link">
                            <ul>
                                <li><a href="services-01.html">Conditions</a></li>
                                <li><a href="contact.html">Terms of Use</a></li>
                                <li><a href="contact.html">Our Services</a></li>
                                <li><a href="blog.html">New Guests List</a></li>
                                <li><a href="about.html">The Team List</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-wrapper mb-30">
                        <h3 class="footer-title">Subscribe</h3>
                        <div class="subscribes-form">
                            <form action="">
                                <input placeholder="Enter email " type="email" >
                                <button class="btn theme-btn-1 width-100 mt-10" ><i
                                        class="lab la-telegram-plane me-2" ></i>subscribe</button>
                            </form>
                        </div>
                        <div class="footer-info">
                            <p>Get the latest updates via email. Any time you may unsubscribe</p>
                        </div>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <div class="footer-bottom-area pt-25 pb-25">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="copyright">
                        <p>© Copyrights 2021 <a href="/">Bnker.</a> All rights reserved.</p>
                    </div>
                </div>
                <!-- col -->
                <!-- /col -->
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="footer-bottom-link text-end">
                        <ul>
                            <li><a href="#">Privacy </a></li>
                            <li><a href="#"> Terms</a></li>
                            <li><a href="#">Sitemap</a></li>
                            <li><a href="#">Help </a></li>
                        </ul>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /Container -->
</footer>
<!-- /Footer -->

<!-- Go top -->
<div class="go-top-area">
    <div class="go-top-wrap">
        <div class="go-top-btn-wrap">
            <div class="go-top go-top-btn">
                <i class="las la-angle-double-up"></i>
                <i class="las la-angle-double-up"></i>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/vendors.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@livewireScripts
@stack('scripts')
</body>
</html>
