@extends('frontend.layouts.master')
@push('styles')
    <link href="{{asset('customer/assets/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('customer/assets/css/newlogin-styles.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('customer/assets/vendor/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('customer/assets/vendor/owl-carousel/owl.theme.default.css')}}">
<style>
    .fa, .fas {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    color: green;
}

   .categories-dropdown-wrap ul li a i {
    font-size: 18px;
    color: #12814e;
    font-weight: 800;
    max-width: 30px;
    margin-right: 15px;
}
.card-2 figure i {
    border-radius: 10px;
    display: inline-block;
    max-width: 80px;
    font-size: 50px;
}
[class^="icon-"], [class*=" icon-"] {
    font-family: 'icomoon';
    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    color: green;
    font-size: 16px;
    font-weight: 800;
    -moz-osx-font-smoothing: grayscale;
}

</style>
  <style>
        .cms-merchant-home .fixed-header {
            position: absolute;
            left: 0;
            width: 100%;
            z-index: 999;
        }
        .shop.login .form .btn {
            margin-right: 0;
        }
        .btn-facebook {
            background: #39579A;
        }
        .btn-facebook:hover {
            background: #073088 !important;
        }
        .btn-github {
            background: #444444;
            color: white;
        }
        .btn-github:hover {
            background: black !important;
        }
        .btn-google {
            background: #ea4335;
            color: white;
        }
        .btn-google:hover {
            background: rgb(243, 26, 26) !important;
        }
        p.note {
            font-size: 1rem;
            color: red;
        }
        label span {
            font-size: 1rem;
        }
        label.error {
            color: red;
            font-size: 1rem;
            margin-top: 5px;
        }
        input.error {
            border: 1px dashed red;
            font-weight: 300;
            color: red;
        }
        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -25px;
            position: relative;
            margin-right: 10px;
            color: #000;
            z-index: 2;
        }
       label#password-field-error .field-icon {
    position: relative; /* Adjust as needed */
    top: -60px; /* Alternative to margin-top */
}
        @media only screen and (min-width: 992px) {
            .ftr_policy_drpdown.dropdown:hover>.dropdown-menu {
                display: block;
                width: auto;
                bottom: 100% !important;
                top: auto !important;
            }
            .ftr_policy_drpdown.dropdown>.dropdown-toggle:active {
                pointer-events: none;
            }
            .ftr_policy_drpdown.dropdown:hover>.dropdown-menu a {
                padding: 3px 10px;
            }
            .ftr_policy_drpdown.dropdown .dropdown-toggle:after {
                border-bottom: .3em solid;
                border-top: none;
            }
        }
        @media only screen and (max-width: 991px) {
            .ftr_policy_drpdown.dropdown>.dropdown-menu.show {
                bottom: 100% !important;
                top: auto !important;
                display: block;
                width: auto;
                transform: none !important;
            }
            .ftr_policy_drpdown.dropdown>.dropdown-menu a {
                padding: 4px 10px;
            }
            .ftr_policy_drpdown.dropdown .dropdown-toggle:after {
                border-bottom: .3em solid;
                border-top: none;
            }
            .ftr_policy_drpdown.dropdown>.dropdown-menu .dropdown-item:focus,
            .ftr_policy_drpdown.dropdown>.dropdown-menu .dropdown-item:hover {
                background-color: #e4e4e4;
                color: #16181b;
                text-decoration: none;
            }
        }
    </style>
@endpush
@section('main-content')
        <main id="merchant-app">
            <section class="py-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-between mb-4 mb-md-0">
                            <div class="bg-pattern flex-box login">
                                <div class="brand-name">
                                    <h1><a href="{{ route('home') }}"><img src="{{asset('customer/assets/images/new/logo-white.svg')}}" class="header-logo img-fluid" alt="Logo"></a></h1>
                                </div>
                                <div class="brand-desc">
                                    <h2 class="mb-3">We are online <br> and ready.</h2>
                                    <p>Welcome back to <br>India's finest E-commerce platform.</p>
                                </div>
                                <div class="brand-slider">
                                    <div id="brand-slider" class="owl-carousel owl-theme">
                                        <div class="item">
                                            <div class="item-content">
                                                <h3>Country (Indian, Srilankan, French)</h3>
                                                <p>Delivery anywhere across country with our dynamic support</p>
                                            </div>
                                            <div class="item-img">
                                                <img src="{{asset('customer/assets/images/login/2.svg')}}" alt="Pan India">
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-content">
                                                <h3>World Class solution.</h3>
                                                <p>We are building the next-gen world class ecosystem for your business.</p>
                                            </div>
                                            <div class="item-img">
                                                <img src="{{asset('customer/assets/images/login/5.svg')}}" alt="World Class Solution">
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-content">
                                                <h3>Fast Payouts.</h3>
                                                <p>We provide quicker, more secure & automated payouts in just seven days.</p>
                                            </div>
                                            <div class="item-img">
                                                <img src="{{asset('customer/assets/images/login/6.svg')}}" alt="Fast Payouts">
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-content">
                                                <h3>Full Control.</h3>
                                                <p>Centralised dashboard with Dynamic control over logistics.</p>
                                            </div>
                                            <div class="item-img">
                                                <img src="{{asset('customer/assets/images/login/1.svg')}}" alt="Full Control">
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-content">
                                                <h3>Multiple Categories.</h3>
                                                <p>You can choose to sell from 15+ Industries with 750+ categories.</p>
                                            </div>
                                            <div class="item-img">
                                                <img src="{{asset('customer/assets/images/login/3.svg')}}" alt="Multiple Categories">
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-content">
                                                <h3>Earn More.</h3>
                                                <p>We have the lowest Flat rate commission across all categories.</p>
                                            </div>
                                            <div class="item-img">
                                                <img src="{{asset('customer/assets/images/login/4.svg')}}" alt="Earn More">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-6 d-flex mb-4 mb-md-0 form-area">
                            <div class="logo">
                                <a href="{{ url('/') }}" title=""><img src="{{asset('customer/assets/images/new/logo-white.svg')}}" alt="Logo"></a>
                            </div>
                            <div class="flex-box-3 login form-section">
                                <h2>Merchant Login</h2>
                                <p class="signup">Don't have an account? <a href="{{route('register.merchantform')}}">Signup</a></p>
                                <div class="login-form">
                                    <!-- Form -->
                                    <div id="mydiv" class="d-none"></div>

                            <div id="alert" class="alert alert-danger bg-danger text-white mb-0" style="display: none;"></div>
                                        @if(session('success'))
                                    <div class="alert alert-dismissable fade show text-center bg-success text-white mb-0">
                                        {{session('success')}}
                                    </div>
                                @endif
                                    <form id="loginForm" method="post" action="{{ route('merchant.merchantsubmit') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Email ID<span>*</span></label>
                                            <input type="email" name="email" id="email" placeholder="" value="{{old('email')}}" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password<span>*</span></label>
                                            <input type="password" name="password" id="password-field" placeholder="" value="{{old('password')}}" class="form-control" required>
                                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        </div>
                                         <div class="login_footer form-group mb-50">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="news" checked="" id="exampleCheckbox1" value="">
                                                        <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                                    </div>
                                                </div>
                                                <a class="text-muted" href="{{ route('merchantpassrest.reset') }}">Forgot password?</a>
                                            </div>

                                        <div class="form-group">
                                            <div class="login-btn">
                                                <div class="btn-wrapper">
                                                    <button class="btn btn-primary" type="submit">Login</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!--/ End Form -->
                                </div>
                            </div>
                            <div class="footer-link">
                                <ul class="list-unstyled">
                                    <li class="dropdown ftr_policy_drpdown">
                                        <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Policies
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="#">Privacy</a></li>
                                            <li><a class="dropdown-item" href="#">Policy</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

@endsection

@push('scripts')

 <!-- Scripts -->
    <script src="{{asset('customer/assets/js/main.js')}}"></script>
    <script src="{{asset('customer/assets/vendor/owl-carousel/owl.carousel.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script>
        (function($) {
            'use strict';
            $('#brand-slider').owlCarousel({
                items: 1,
                autoplay: true,
                autoplayTimeout: 5000,
                smartSpeed: 400,
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                autoplayHoverPause: true,
                loop: true,
                nav: false,
                merge: true,
                dots: true,
                margin: 10
            });
            $(".toggle-password").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        })(jQuery);

        $(document).ready(function() {
            // Set CSRF token in the request header
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // jQuery validation
            $("#loginForm").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    }
                },
                messages: {
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please enter your password",
                        minlength: "Your password must be at least 8 characters long"
                    }
                },

            });

            // Login form submission with AJAX
            $("#loginForm").on("submit", function(e) {
                e.preventDefault();
                var form = $(this);
                if (form.valid()) {
                    $.ajax({
                        url: form.attr("action"),
                        type: "POST",
                        data: form.serialize(),
                        success: function(response) {
                            if (response.success) {
                                window.location.href = response.redirect_url;
                            } else {
                                $("#alert").text(response.message).show();
                                 setTimeout(function() {
                            $("#alert").hide();
                        }, 5000);
                            }
                        },
                        error: function(xhr) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $("#" + key + "-error").text(value[0]).show();
                                $("#" + key).addClass("is-invalid");
                            });
                        }
                    });
                }
            });
        });

    </script>
      <script>
    setTimeout(function(){
      $('.alert').slideUp();
    },4000);
  </script>
  @endpush



