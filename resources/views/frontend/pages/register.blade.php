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
                            <a href="{{ route('home') }}" title=""><img src="{{ asset('customer/assets/images/new/logo-white.svg') }}" alt=""></a>
                        </div>

                        <div class="flex-box-3 register form-section">
                             <div class="alert alert-success mb-0" role="alert" id="success_msg" style="display: none">
                            <h4 class="alert-heading font-size-14">Registration successfully!</h4>
                            <p>An account verification link has been sent to your email address.Please click on the link to complete the sign up process.</p>
                        </div>
                            <h2>Get Started</h2>
                            <p class="signup">Have an account? <a href="{{ route('login.form') }}">Login</a></p>

<!-- HTML Form -->

<div class="register-form">
    <form id="registerForm" method="POST" action="{{ route('register.submit') }}" autocomplete="off">
        @csrf
          <div class="row">
             <div class="col-md-6">
            <div class="form-group">
            <label for="name">First Name<span class="required">*</span></label>
            <input type="text" id="name" name="name" class="form-control" >
            </div>
        </div>
         <div class="col-md-6">
            <div class="form-group">
            <label for="lname">Surname<span class="required">*</span></label>
            <input type="text" id="lname" name="lname" class="form-control" >
            </div>
        </div>
          </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="emailAddress">Email ID<span class="required">*</span></label>
                    <input type="email" id="emailAddress" name="email" class="form-control" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="emailAddress">Confirm Email ID<span class="required">*</span></label>
                    <input type="email" id="confirmemailAddress" name="confirmemailAddress" class="form-control" >
                </div>
            </div>
        </div>
         {{--  <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="gender">Gender<span class="required">*</span></label>
                                                <select class="form-control" name="gender" id="gender">
                                                    <option value="">--Select Gender--</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="birth_month">Birth Month<span class="required">*</span></label>
                                                <select class="form-control" name="birth_month" id="birth_month">
                                                     <option value="">--Select Birth Month--</option>
                                                    <option value="january">January</option>
                                                    <option value="february">February</option>
                                                    <option value="march">March</option>
                                                    <option value="april">April</option>
                                                    <option value="may">May</option>
                                                    <option value="june">June</option>
                                                    <option value="july">July</option>
                                                    <option value="august">August</option>
                                                    <option value="september">September</option>
                                                    <option value="october">October</option>
                                                    <option value="november">November</option>
                                                    <option value="december">December</option>
                                                </select>
                                            </div>
                                        </div>
         </div>  --}}
     <div class="row">
        <div class="col-md-6">
        <div class="form-group">
            <label for="password">Password<span class="required">*</span></label>
            <input type="password" id="password" name="password" class="form-control" >
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label for="cpassword">Confirm Password<span class="required">*</span></label>
            <input type="password" id="cpassword" name="password_confirmation" class="form-control" >
        </div>
     </div>
     </div>
      <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mobileNumber">Mobile Number<span class="required">*</span></label>
                    <input type="text" id="mobileNumber" name="mobile_number" class="form-control" >
                </div>
            </div>
             <div class="col-md-6">
                <div class="form-group">
                <label class="form-label" for="postcode">Post Code  (Letters & Numbers  e.g  EN1 1SP)<span class="required">*</span></label>
                <input type="text" class="form-control" name="postcode" id="postcode" placeholder="">
                </div>
            </div>
        </div>
                <label id="agree-error" class="error" style="display:none"></label>

    <div class="login_footer form-group mb-50">
        <div class="chek-form">
            <div class="custome-checkbox">
                <input class="form-check-input" type="checkbox" name="agree" id="exampleCheckbox12">
                <label class="form-check-label" for="exampleCheckbox12">
                    <span>
                        I accept
                        <a href="/privacy-policy" target="_blank" style="color: rgb(214, 33, 41);">Privacy Policy</a>
                        and
                        <a href="/terms-and-condition" target="_blank" style="color: rgb(214, 33, 41);">Terms of conditions</a> of Winngoo Pages.
                    </span>
                </label>
            </div>
        </div>
    </div>

        <div class="login-btn">
            <div class="btn-wraper">
                <button type="submit" class="btn btn-md btn-primary w-50 p-2 mb-50">JOIN FOR FREE</button>
            </div>
        </div>
    </form>
</div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

@endsection

@push('scripts')

  <script src="{{ asset('customer/assets/js/merchant.js') }}"></script>

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

<!-- JavaScript -->
<script>
    $(document).ready(function() {
          $.validator.addMethod('emailExists', function (value, element) {
                let result = false;
                $.ajax({
                    type: 'POST',
                    url: '{{ route("check.registration") }}',
                    data: { email: value, _token: '{{ csrf_token() }}' },
                    async: false,
                    success: function (response) {
                        result = !response.email_exists;
                    }
                });
                return result;
            }, 'Email already registered.');

            $.validator.addMethod('mobileExists', function (value, element) {
                let result = false;
                $.ajax({
                    type: 'POST',
                    url: '{{ route("check.registration") }}',
                    data: { mobile_number: value, _token: '{{ csrf_token() }}' },
                    async: false,
                    success: function (response) {
                        result = !response.mobile_exists;
                    }
                });
                return result;
            }, 'Mobile number already registered.');

        $('#success_msg').hide();
         // Set CSRF token in the request header
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



        $('#registerForm').validate({ // Initialize validation plugin

            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                lname: {
                    required: true,
                    minlength: 1
                },
                mobile_number: {
                    required: true,
                    digits: true,
                    minlength: 11,
                    maxlength: 11,
                    mobileExists: true,
                },
                postcode: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                    emailExists: true
                },
                confirmemailAddress: {
                    required: true,
                    equalTo: "#emailAddress"
                },

                password: {
                    required: true,
                    minlength: 8
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                },
                agree: {
                required: true
            }
            },
            messages: {
                name: {
                    required: "Please enter your first name",
                    minlength: "Your first name must consist of at least 2 characters"
                },
                 lname: {
                    required: "Please enter your Last name",
                    minlength: "Your last name must consist of at least 1 characters"
                },
                mobile_number: {
                    required: "Please enter your mobile number",
                    digits: "Please enter a valid mobile number",
                    minlength: "Mobile number must be 11 digits",
                    maxlength: "Mobile number must be 11 digits"
                },
                 postcode: {
                    required: "Please enter your postcode",
               },
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address"
                },
                 confirmemailAddress: {
                    required: "Please confirm your email",
                    equalTo: "Email do not match"
                },
                gender: {
                    required :"Please select your gender"
                },

                birth_month: {
                        required :"Please select your birth month"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long"
                },
                password_confirmation: {
                    required: "Please confirm your password",
                    equalTo: "Passwords do not match"
                },
                agree: {
                    required: "You must agree to the terms and conditions"
                }

            },

            errorPlacement: function(error, element) { // Customize error placement
                error.insertAfter(element);
            },
        submitHandler: function(form) {
        $.ajax({
            url: $(form).attr('action'),
            method: 'POST',
            data: $(form).serialize(),
            success: function(response) {
                $('#success_msg').show();
                $("#registerForm")[0].reset();
                // Optionally redirect to login page or perform other actions
            },
            error: function(xhr, status, error) {
                var err = JSON.parse(xhr.responseText);
                if (err.errors) {
                    $.each(err.errors, function(key, value) {
                        $("#" + key).addClass('is-invalid');
                        $("#" + key + "-error").text(value);
                        if(value[0] == 'The agree field is required.'){
                         $("#agree-error").text('You must agree to the terms and conditions.');
                         $("#agree-error").attr('style','display:block');
                        }
                    });
                } else {
                    if (err.message && err.message === 'The email has already been taken.') {
                        // Handle email already taken error
                        $("#emailAddress").addClass('is-invalid');
                        $("#emailAddress-error").text('This email is already registered.');
                    } else {
                        alert('An error occurred. Please try again.');
                    }
                }
        }
    });
    return false;
}
        });
    });
</script>

  @endpush
