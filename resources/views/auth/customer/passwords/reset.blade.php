
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
        .custom-control-label::before{
  border-color: #000;
}
.custom-control-input:focus{
  border-color: #000;
}
.custom-control-input:focus:not(:checked) ~ .custom-control-label::before{
  border-color: #000;
}
.custom-control-input:checked ~ .custom-control-label::before{
    border-color: #000;
    background-color: #000;
}
.was-validated .custom-control-input:invalid ~ .custom-control-label, .custom-control-input.is-invalid ~ .custom-control-label{
  color:#000;
}

    </style>
@endpush
@section('main-content')
        <main id="merchant-app">
            <section class="py-3">
                <div class="container-fluid">
                    <div class="row">

                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ __('Reset Password') }}</div>

                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Reset Password</button>
                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                
            </section>
        </main>

@endsection

@push('scripts')

<script src="{{ asset('customer/assets/vendor/owl-carousel/owl.carousel.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

<script>
    (function($) {
        'use strict';

        $('#brand-slider').owlCarousel({
			items:1,
			autoplay:true,
			autoplayTimeout:5000,
			smartSpeed: 400,
			animateIn: 'fadeIn',
			animateOut: 'fadeOut',
			autoplayHoverPause:true,
			loop:true,
			nav:false,
			merge:true,
			dots:true,
            margin:20
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

</script>


  @endpush



