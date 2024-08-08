<!DOCTYPE html>
<html lang="en">

<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <title>Winngoo</title>
    <link rel="icon" href="{{asset('customer/assets/images/new/logo-white.svg')}}" type="image/png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta content="" name="keywords"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('merchant/site/plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('merchant/site/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('merchant/site/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('merchant/site/plugins/steps/steps.css')}}">
<link rel="stylesheet" href="{{ asset('merchant/frontend/css/cdn/bootstrap-datetimepicker.css')}}">
    <!-- CUSTOM CSS -->
    <link href="{{ asset('merchant/site/css/style.css')}}" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('customer/cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css') }}">
    <link href="{{ asset('customer/assets/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/assets/css/new-styles.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Nunito+Sans&display=swap" rel="stylesheet">
    <link href="{{ asset('customer/frontend/css/line-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('customer/assets/vendor/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/assets/vendor/owl-carousel/owl.theme.default.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
    a.disabled {
        pointer-events: none; /* Prevent clicking */
        opacity: 0.5; /* Visual indication of being disabled */
        cursor: not-allowed; /* Change cursor to indicate disabled state */
    }
        .input-group-addon {

    color: #5cb85c !important;
}
         .input-icon i {
            position: absolute;
            top: 50%;
            left: 10px; /* Adjust this value based on your input padding */
            transform: translateY(-50%);
            color: #aaa; /* Adjust the icon color as needed */
        }

        .input-icon input {
            padding-left: 35px; /* Adjust this value based on icon size and positioning */
        }
    #agree {
    border-color: #000;
    height: 13px !important;
    }

    .cms-merchant-home .fixed-header {
        position: absolute;
        left: 0;
        width: 100%;
        z-index: 999;
    }

    .shop.login .form .btn{
        margin-right:0;
    }
    .btn-facebook{
        background:#39579A;
    }
    .btn-facebook:hover{
        background:#073088 !important;
    }
    .btn-github{
        background:#444444;
        color:white;
    }
    .btn-github:hover{
        background:black !important;
    }
    .btn-google{
        background:#ea4335;
        color:white;
    }
    .btn-google:hover{
        background:rgb(243, 26, 26) !important;
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
          {{--  font-size: 1rem;  --}}
          display: block;
          margin-top: 5px;
      }

      input.error {
          border: 1px dashed red;
          font-weight: 300;
          color: red;
      }
       select.error {
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
    .form-section select {
    height: 38px;
}
    </style>
    <style>
        @media  only screen and (min-width: 992px) {
            .ftr_policy_drpdown.dropdown:hover>.dropdown-menu {
                display: block;
                width: auto;
                bottom: 100%!important;
                top: auto!important;
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
        @media  only screen and (max-width: 991px) {
            .ftr_policy_drpdown.dropdown > .dropdown-menu.show {
                bottom: 100%!important;
                top: auto!important;
                display: block;
                width: auto;
                transform: none!important;
            }
            .ftr_policy_drpdown.dropdown >.dropdown-menu a {
                padding: 4px 10px;
            }
            .ftr_policy_drpdown.dropdown .dropdown-toggle:after {
                border-bottom: .3em solid;
                border-top: none;
            }
            .ftr_policy_drpdown.dropdown >.dropdown-menu .dropdown-item:focus, .ftr_policy_drpdown.dropdown >.dropdown-menu .dropdown-item:hover {
                background-color: #e4e4e4;
                color: #16181b;
                text-decoration: none;
            }
        }

    </style>
  </head>
  <body>
 <div id="app">
    <main id="merchant-app">
        <section class="py-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-between mb-4 mb-md-0">
                         {{--  <div class="bg-pattern flex-box register">  --}}
                               <div class="bg-pattern flex-box register" style="background-image: url('{{asset('merchant/images/44a1c82a-7436-4b45-9124-53a27f50c091.png')}}')">
                    <div class="brand-name">
                        <h1><a href="{{ route('home') }}"><img src="{{asset('customer/assets/images/new/logo-white.svg')}}" class="header-logo img-fluid"></a></h1>
                    </div>
                    <div class="brand-desc">
                        <h2 class="mb-3">Start your <br>journey with us.</h2>
                        <p>Discover the best solutions for <br>your online business.</p>
                    </div>
                    <div class="brand-slider">
                        <div id="brand-slider" class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="item-content">
                                    <h3>Pan India.</h3>
                                    <p>Delivery anywhere across India with our dynamic logistics & support</p>
                                </div>
                                <div class="item-img">
                                    <img src="{{asset('customer/assets/images/login/2.svg')}}" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-content">
                                    <h3>World Class solution.</h3>
                                    <p>We are building the next-gen
                                        world class ecosystem for
                                        your business.
                                        </p>
                                </div>
                                <div class="item-img">
                                    <img src="{{asset('customer/assets/images/login/5.svg')}}" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-content">
                                    <h3>Fast Payouts.</h3>
                                    <p>We provide quicker, more
                                        secure & automated payouts
                                        in just seven days.</p>
                                </div>
                                <div class="item-img">
                                    <img src="{{asset('customer/assets/images/login/6.svg')}}" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-content">
                                    <h3>Full Control.</h3>
                                    <p>Centralised dashboard
                                        with Dynamic control over
                                        logistics.</p>
                                </div>
                                <div class="item-img">
                                    <img src="{{asset('customer/assets/images/login/1.svg')}}" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-content">
                                    <h3>Multiple Categories.</h3>
                                    <p>You can choose to sell
                                        from 15+ Industries with
                                        750+ categories.
                                        </p>
                                </div>
                                <div class="item-img">
                                    <img src="{{asset('customer/assets/images/login/3.svg')}}" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-content">
                                    <h3>Earn More.</h3>
                                    <p>We have the lowest Flat
                                        rate commission across
                                        all categories.
                                        </p>
                                </div>
                                <div class="item-img">
                                    <img src="{{asset('customer/assets/images/login/4.svg')}}" />
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

                            <h2>Get Started</h2>
                            <p class="signup">Have an account? <a href="{{ route('merchant.loginform') }}">Login</a></p>

<!-- HTML Form -->

                        <div class="register-form">
                <form autocomplete="off" action="{{ route('merchant.register.post') }}" method="POST" class="form-signin" role="form" id="merchant-signup-form" enctype="multipart/form-data">
                            @csrf
                        <h4 id="tab-header-text"></h4>
                        <div id="wizard">
                            <h4></h4>
                            <section>
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <span class="custom-checkbox">
                                            <input type="checkbox" id="agree" name="agree" required  />
                                            <label for="agree">
                                                <span>I agree the Agreement
                                                    <a href='merchant-terms-and-conditions.html' target='_blank'>
                                                        Winngoo Pages.
                                                    </a>
                                                </span>
                                            </label>
                                        </span>
                                   </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label for="business_type" class="text-capitalize">Choose your Business Type<span class="text-danger"> *</span></label>
                                    <select name="business_type_id" id="business_type_id" class="form-control" required>
                                    <option value="-1" disabled selected>Select an Business Type</option>
                                        @foreach($merchantprice as $type)
                                         @if($type->type == "Francise/Multi Business")
                                            <option value="{{ $type->id }}">{{ $type->type }} - ({{ $type->range }})</option>
                                        @else
                                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                                        @endif
                                        @endforeach
                                        </select>
                                </div>
                                    </div>
                                       {{--  <div class="col-md-6">
                                 <div class="form-group">
                                            <label for="username" class="text-capitalize">Username<span class="text-danger"> *</span></label>
                                            <input type="text"
                                                id="username"
                                                name="username"
                                                class="form-control "
                                                autocomplete="username" autofocus
                                                placeholder="Enter your username"
                                                value=""
                                                required
                                            />
                                   </div>
                                    </div>  --}}
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="text-capitalize">Email<span class="text-danger"> *</span></label>
                                            <input type="email"
                                                id="email"
                                                name="email"
                                                class="form-control "
                                                autocomplete="email" autofocus
                                                placeholder="Enter your email"
                                                value=""
                                                required
                                            />
                                   </div>
                                    </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="text-capitalize">Confirm Email<span class="text-danger"> *</span></label>
                                            <input type="email"
                                                id="confirmemail"
                                                name="confirmemail"
                                                class="form-control "
                                                autocomplete="email" autofocus
                                                placeholder="Enter your confirm email"
                                                value=""
                                                required
                                            />
                                   </div>
                                    </div>
                                </div>
                                     <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name" class="text-capitalize">First Name<span class="text-danger"> *</span></label>
                                            <input type="text"
                                                id="first_name"
                                                name="first_name"
                                                class="form-control "
                                                placeholder="Enter First Name"
                                                value=""
                                                required
                                            />
                                </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="last_name" class="text-capitalize">Last Name<span class="text-danger"> *</span></label>
                                            <input type="text"
                                                id="last_name"
                                                name="last_name"
                                                class="form-control "
                                                placeholder="Enter Last Name"
                                                value=""
                                                required
                                            />
                                   </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="password" class="text-capitalize">
                                                Password
                                                <span class="text-danger"> *</span>
                                                <a href="#" data-toggle="tooltip" data-html="true" title='
                                                    <div class="">
                                                        <p class="text-white mb-0">
                                                            <strong>Password must contain:</strong>
                                                            Minimum 8 characters with an uppercase Letter, a lowercase Letter and a number.
                                                        </p>
                                                        <p class="text-white mb-0">
                                                            Special characters can be used but are optional. Supported characters are:
                                                            <small># @ $ ! % * ? - £</small>
                                                        </p>
                                                    </div>
                                                '><i class="fa fa-info-circle"></i></a>
                                            </label>
                                            <div class="input-group">
                                                <input id="password"
                                                    type="password"
                                                    class="password form-control "
                                                    name="password"
                                                    placeholder="Password"
                                                    autocomplete="off"
                                                    required
                                                    autocomplete="new-password"
                                                />
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary togglePassword" type="button">
                                                        <i class="fa fa-eye-slash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                                                                    </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="confirm_password" class="text-capitalize">Confirm Password<span class="text-danger"> *</span></label>
                                            <div class="input-group">
                                                <input id="confirm_password"
                                                    type="password"
                                                    class="password form-control "
                                                    name="confirm_password"
                                                    placeholder="Confirm Password"
                                                    autocomplete="off"
                                                    required
                                                    autocomplete="new-password"
                                                />
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary togglePassword" type="button">
                                                        <i class="fa fa-eye-slash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <h4></h4>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address_line_1" class="text-capitalize">Address Line 1<span class="text-danger"> *</span></label>
                                            <input type="text"
                                                id="address_line_1"
                                                name="address_line_1"
                                                class="form-control "
                                                placeholder="Enter Address Line 1"
                                                value=""
                                                required
                                            />
                                            <input type="hidden" name="latitude" id="latitude" value="">
                                            <input type="hidden" name="longitude" id="longitude" value="">
                                                                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address_line_2" class="text-capitalize">Address Line 2</label>
                                            <input type="text"
                                                id="address_line_2"
                                                name="address_line_2"
                                                class="form-control "
                                                placeholder="Enter Address Line 2"
                                                value=""
                                            />
                                                                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address_line_3" class="text-capitalize">Address Line 3</label>
                                            <input type="text"
                                                id="address_line_3"
                                                name="address_line_3"
                                                class="form-control "
                                                placeholder="Enter Address Line 3"
                                                value=""
                                            />
                                                                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city" class="text-capitalize">City/Town<span class="text-danger"> *</span></label>
                                            <input type="text"
                                                id="city"
                                                name="city"
                                                class="form-control "
                                                placeholder="Enter City/Town"
                                                value=""
                                                required
                                            />
                                                                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="post_code" class="text-capitalize">Post Code<span class="text-danger"> *</span></label>
                                            <input type="text"
                                                id="post_code"
                                                name="post_code"
                                                class="form-control "
                                                placeholder="Enter Post Code"
                                                value=""
                                                required
                                            />
                                                                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country" class="text-capitalize">Country<span class="text-danger"> *</span></label>
                                            <input type="text"
                                                id="country"
                                                name="country"
                                                class="form-control "
                                                placeholder="Enter country"
                                                value=""
                                                required
                                            />
                                            {{--  <select class="form-control" name="country" id="country">
                                                <option value="-1" disabled selected>Select an Country</option>
                                                @foreach($country as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>  --}}
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_number" class="text-capitalize">Phone Number<span class="text-danger"> *</span></label>
                                            <input type="tel"
                                                id="phone_number"
                                                name="phone_number"
                                                class="form-control "
                                                placeholder="Enter Phone Number"
                                                value=""
                                                required
                                            />
                                                                                    </div>
                                    </div>

                                </div>
                            </section>
                            <h4></h4>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="business_name" class="text-capitalize">Business Name<span class="text-danger"> *</span></label>
                                            <input type="text"
                                                id="business_name"
                                                name="business_name"
                                                class="form-control "
                                                placeholder="Enter Business Name"
                                                value=""
                                                required
                                            />
                                                                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="trading_name" class="text-capitalize">Trading Name</label>
                                            <input type="text"
                                                id="trading_name"
                                                name="trading_name"
                                                class="form-control "
                                                placeholder="Enter Trading Name"
                                                value=""
                                            />
                                                                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category" class="text-capitalize">Category<span class="text-danger"> *</span></label>
                                            <input type="hidden" name="_categoryId" value="1"/>
                                            <div class="w-100 multiselect-section">
                                                <select class="form-control multiselect"
                                                    name="category_id[]"
                                                    id="category"
                                                    multiple="multiple"
                                                    required>
                                                @foreach ($categories as $category)
                                                    <option type="checkbox" value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                                @endforeach

                                            </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sub_category" class="text-capitalize">Sub Category<span class="text-danger"> *</span></label>
                                            <div class="w-100 multiselect-section">
                                                <select class="form-control" name="sub_category_id[]" id="sub_category"
                                                    multiple="multiple" required>
                                                </select>
                                        </div>
                                        </div>
                                    </div>
                                      <div class="col-md-6" id="otherCategoryDiv"  style="display:none;">
                                     <div class="form-group">
                                         <div  class="text-capitalize">
                                            <label for="otherCategory">Please specify category:</label>
                                            <input type="text" id="othercategory" name="othercategory" class="form-control" placeholder="Enter specify category" value="">
                                        </div>
                                    </div>
                                    </div>
                                     <div class="col-md-6" id="othersubCategoryDiv"  style="display:none;">
                                     <div class="form-group">
                                         <div  class="text-capitalize">
                                            <label for="otherCategory">Please specify sub-category:</label>
                                            <input type="text" id="othersubcategory" name="othersubcategory" class="form-control" placeholder="Enter specify sub-category" value="">
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="business_description" class="text-capitalize">Business Desription<span class="text-danger"> *</span></label>
                                            <textarea class="form-control"
                                                minlength="20" maxlength="1000"
                                                id="business_description"
                                                name="business_description"
                                                required></textarea>
                                    </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="website_link" class="text-capitalize">Website Link</label>
                                            <input type="text"
                                                id="website_link"
                                                name="website_link"
                                                class="form-control "
                                                placeholder="Enter Website Link"
                                                value=""
                                            />
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image" class="text-capitalize">Logo & Photo (attachment <200kb)<span class="text-danger"> *</span></label>
                                            <input type="file" id="image" name="image" accept="image/*"
                                               class="form-control form-file-control" required>
                                    </div>
                                    </div>
                                </div>
                            </section>
                            <h4></h4>
                            <section>
                                <div class="row d-none d-sm-flex">
                                    <div class="col-sm-3 text-center">
                                        <label>Day</label>
                                    </div>
                                    <div class="col-sm-3 text-center">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-sm-3 text-center">
                                        <label>Opening Time</label>
                                    </div>
                                    <div class="col-sm-3 text-center">
                                        <label>Closing Time</label>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <input type="text" name="dayOfWeek[]"
                                               class="form-control"
                                               value="Monday" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <select class="form-control"
                                                    name="status[]"
                                                    value="Open" onchange="toggleTime(this)"
                                                    >
                                                <option value="Open">Open</option>
                                                <option value="Close">Closed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class='input-group date'>
                                                <input type="text"
                                                       name="openingTime[]"
                                                       class="form-control"
                                                       value="9:00 AM" >
                                                <span class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class='input-group date'>
                                                <input type="text"
                                                       name="closingTime[]"
                                                       class="form-control"
                                                       value="6:00 PM" >
                                                <span class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="dayType[]"
                                           class="form-control"
                                           value="Weekday">
                                    <input type="hidden" name="dayOrder[]"
                                           class="form-control"
                                           value="1">
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <input type="text" name="dayOfWeek[]"
                                               class="form-control"
                                               value="Tuesday" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <select class="form-control"
                                                    name="status[]"
                                                    value="Open" onchange="toggleTime(this)"
                                                    >
                                                <option value="Open">Open</option>
                                                <option value="Close">Closed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class='input-group date'>
                                                <input type="text"
                                                       name="openingTime[]"
                                                       class="form-control"
                                                       value="9:00 AM" >
                                                <span class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class='input-group date'>
                                                <input type="text"
                                                       name="closingTime[]"
                                                       class="form-control"
                                                       value="6:00 PM" >
                                                <span class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="dayType[]"
                                           class="form-control"
                                           value="Weekday">
                                    <input type="hidden" name="dayOrder[]"
                                           class="form-control"
                                           value="2">
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <input type="text" name="dayOfWeek[]"
                                               class="form-control"
                                               value="Wednesday" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <select class="form-control"
                                                    name="status[]"
                                                    value="Open" onchange="toggleTime(this)"
                                                    >
                                                <option value="Open">Open</option>
                                                <option value="Close">Closed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class='input-group date'>
                                                <input type="text"
                                                       name="openingTime[]"
                                                       class="form-control"
                                                       value="9:00 AM" >
                                                <span class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class='input-group date'>
                                                <input type="text"
                                                       name="closingTime[]"
                                                       class="form-control"
                                                       value="6:00 PM" >
                                                <span class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="dayType[]"
                                           class="form-control"
                                           value="Weekday">
                                    <input type="hidden" name="dayOrder[]"
                                           class="form-control"
                                           value="3">
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <input type="text" name="dayOfWeek[]"
                                               class="form-control"
                                               value="Thusday" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <select class="form-control"
                                                    name="status[]"
                                                    value="Open" onchange="toggleTime(this)"
                                                    >
                                                <option value="Open">Open</option>
                                                <option value="Close">Closed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class='input-group date'>
                                                <input type="text"
                                                       name="openingTime[]"
                                                       class="form-control"
                                                       value="9:00 AM" >
                                                <span class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class='input-group date'>
                                                <input type="text"
                                                       name="closingTime[]"
                                                       class="form-control"
                                                       value="6:00 PM" >
                                                <span class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="dayType[]"
                                           class="form-control"
                                           value="Weekday">
                                    <input type="hidden" name="dayOrder[]"
                                           class="form-control"
                                           value="4">
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <input type="text" name="dayOfWeek[]"
                                               class="form-control"
                                               value="Friday" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <select class="form-control"
                                                    name="status[]"
                                                    value="Open" onchange="toggleTime(this)"
                                                    >
                                                <option value="Open">Open</option>
                                                <option value="Close">Closed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class='input-group date'>
                                                <input type="text"
                                                       name="openingTime[]"
                                                       class="form-control"
                                                       value="9:00 AM" >
                                                <span class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class='input-group date'>
                                                <input type="text"
                                                       name="closingTime[]"
                                                       class="form-control"
                                                       value="6:00 PM" >
                                                <span class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="dayType[]"
                                           class="form-control"
                                           value="Weekday">
                                    <input type="hidden" name="dayOrder[]"
                                           class="form-control"
                                           value="5">
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" name="dayOfWeek[]"
                                               class="form-control"
                                               value="Saturday" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <select class="form-control"
                                                    name="status[]"
                                                    value="Open" onchange="toggleTime(this)"
                                                    >
                                                <option value="Open">Open</option>
                                                <option value="Close">Closed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <div class='input-group date'>
                                                <input type="text"
                                                       name="openingTime[]"
                                                       class="form-control"
                                                       value="9:00 AM" >
                                                <span class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <div class='input-group date'>
                                                <input type="text"
                                                       name="closingTime[]"
                                                       class="form-control"
                                                       value="6:00 PM" >
                                                <span class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="dayType[]"
                                           class="form-control"
                                           value="Weekend">
                                    <input type="hidden" name="dayOrder[]"
                                           class="form-control"
                                           value="6">
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" name="dayOfWeek[]"
                                               class="form-control"
                                               value="Sunday" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <select class="form-control"
                                                    name="status[]"
                                                    value="Open" onchange="toggleTime(this)"
                                                    >
                                                <option value="Open">Open</option>
                                                <option value="Close">Closed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <div class='input-group date'>
                                                <input type="text"
                                                       name="openingTime[]"
                                                       class="form-control"
                                                       value="9:00 AM" >
                                                <span class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <div class='input-group date'>
                                                <input type="text"
                                                       name="closingTime[]"
                                                       class="form-control"
                                                       value="6:00 PM"
                                                       id="datetimepicker1">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="dayType[]"
                                           class="form-control"
                                           value="Weekend">
                                    <input type="hidden" name="dayOrder[]"
                                           class="form-control"
                                           value="7">
                                </div>


                            </section>
                            </form>

                     <h4></h4>
                           <section>
    <div class="row">
        <div class="col-md-8 col-lg-6">
            <div class="form-group">
                <label for="coupon_code" class="text-uppercase">Coupon Code</label>
                <div class="input-group">
                    <input type="text" id="coupon_code" name="coupon_code" class="form-control" placeholder="Enter a valid coupon code" value=""/>
                    <div class="input-group-append">
                        <input type="button" class="btn btn-outline-success" value="Apply" id="apply-coupon" data-validate-url="#">
                    </div>
                </div>

            </div>
        </div>
    </div>
     <span id="coupon_errmsg"></span>
    <span id="coupon_successmsg"></span>
    <div class="row mt-2">
        <div class="col-12">
            <div class="list">
                <div class="border-bottom d-flex p-2">
                    <div>Business Type</div>
                    <div class="ml-auto">
                        <span id="membership_business_name"></span>
                    </div>
                </div>
                <div class="border-bottom d-flex p-2">
                    <div>Annual Membership</div>
                    <div class="ml-auto">
                        <span>£</span>
                        <span id="merchant_price"></span>
                    </div>
                </div>
                <div class="border-bottom d-flex p-2">
                    <div>Promotional Code/Special Offer Discount</div>
                    <div class="ml-auto">

                        <span id="discount-span-id">0.00</span>
                    </div>
                </div>

                <div class="border-bottom d-flex p-2">
                    <div>VAT Rate</div>
                    <div class="ml-auto">
                        <span>£</span>
                        <span id="merchant_vatrate"></span>
                    </div>
                </div>

                <div class="border-bottom d-flex p-2">
                    <div><strong>Subtotal</strong></div>
                    <div class="ml-auto">
                        <span>£</span>
                        <span id="subtotal-span-id" class="font-weight-bold"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

                <h4></h4>
                    <section>
        <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <div class="panel panel-default credit-card-box" id="paycreditpage">
                <div class="panel-heading display-table" >
                        <h3 class="panel-title" style="font-size: 16px;font-weight: 800;">Payment Details</h3>
                </div>
                <div class="alert alert-danger" role="alert" id="paymentfail" style="display: none">

                </div>
  <div class="panel-body">
    <div id="payment-form" class="require-validation" novalidate data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">
        @csrf
           <div class="row mt-2">
        <div class="col-12">
            <div class="list">
                <div class="border-bottom d-flex p-2">
                    <div>Business Type</div>
                    <div class="ml-auto">
                        <span id="membership_bt"></span>
                    </div>
                </div>
                <div class="border-bottom d-flex p-2">
                    <div>Currency</div>
                    <div class="ml-auto">
                        <span id="merchant_currency"></span>
                    </div>
                </div>
                <div class="border-bottom d-flex p-2">
                    <div>Order Description</div>
                    <div class="ml-auto">
                        <span id="orderdescription"></span>
                    </div>
                </div>

               <div class="border-bottom d-flex p-2">
                    <div>Payable Amount</div>
                    <div class="ml-auto">
                        <span id="subtotalbusiness"></span>
                    </div>
                </div>
                <div id="sub_pay_total"></div>
            </div>
        </div>
    </div><br>
            <div id="paymentsection">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group position-relative">
                    <label for="name-on-card" class="text-capitalize">Name on Card<span class="text-danger"> *</span></label>
                    <div class="input-icon" id="namecard" style="position: relative;">
                    <i class="fa-solid fa-user"></i>
                    <input class="form-control form-control-card" type="text" id="name-on-card" name="name_on_card" placeholder="Enter holder name">
                    <span id="card_name-error" class="error" for="card_name" style="display: none"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group position-relative">
                <label for="card-number" class="text-capitalize">Card Number<span class="text-danger"> *</span></label>
                <div class="input-icon" id="cardinput" style="position: relative;">
                    <i class="fa-solid fa-credit-card"></i>
                    <input class="form-control form-control-card card-number" size="20" type="text" id="card-number" placeholder="xxxx xxxx xxxx xxxx" name="card_number">
                <span id="card_error" class="error" for="card_error" style="display: none"></span>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 form-group position-relative">
                <label class="expire-label">Expiration Month<span class="text-danger"> *</span></label>
                <div class="input-icon" id="expinput" style="position: relative;">
                <i class="fa-solid fa-calendar-week"></i>
                <input class="form-control form-control-card card-expiry-month" placeholder="MM" size="2" type="text" name="card_expiry_month" id="card_expiry_month">
                <span id="card_expiry_month_error" class="error" for="card_expiry_month_error" style="display: none"></span>
            </div>
            </div>
            <div class="col-md-4 form-group position-relative">
                <label class="expyr-label">Expiration Year<span class="text-danger"> *</span></label>
                <div class="input-icon" id="yearinput" style="position: relative;">
                <i class="fa-solid fa-calendar-days"></i>
                <input class="form-control form-control-card card-expiry-year" placeholder="YYYY" size="4" type="text" name="card_expiry_year" id="card_expiry_year">
                <span id="card_expiry_year_error" class="error" for="card_expiry_year_error" style="display: none"></span>
                </div>
            </div>
               <div class="col-md-4 form-group position-relative">
                <label class="cvc-label">CVC<span class="text-danger"> *</span></label>
                <div class="input-icon" id="cvcinput" style="position: relative;">
                <i class="fa-solid fa-lock"></i>
                <input autocomplete="off" class="form-control form-control-card card-cvc" placeholder="ex. ***" size="4" type="text" name="card_cvc" id="card_cvc">
                <span id="card_cvc_error" class="error" for="card_cvc_error" style="display: none"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <button class="btn btn-primary btn-lg btn-block d-none" id="pay-now" type="button">Pay</button>
            </div>
        </div>
        </div>
    </div>
</div>

            </div>
          <div class="panel panel-default credit-card-box" id="payscesspage" style="display: none">
            <div class="alert alert-success" role="alert">
            <h4 class="alert-heading"  id="paysta">Payment Status</h4>
            <p id="payment_status"></p>
            </div>

          </div>
        </div>

    </div>
    </section>
    </div>

                </div>
                        </div>
                        <div class="footer-link">
                            <ul class="list-unstyle">
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
</div>

        <!-- JAVASCRIPTS -->
    <script src="{{ asset('merchant/site/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('merchant/site/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('merchant/site/plugins/tether/js/tether.min.js')}}"></script>
    <script src="{{ asset('merchant/site/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('customer/assets/vendor/owl-carousel/owl.carousel.js') }}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAd_DUY_rdLbA5J_jtOTgIFpmKqEAqpcYU&libraries=places"></script>
<script src="{{ asset('merchant/site/plugins/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
<script src="{{ asset('merchant/frontend/js/moment.min.js')}}"></script>
<script src="{{ asset('merchant/frontend/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{ asset('merchant/site/plugins/steps/jquery.steps.js')}}"></script>
<script src="{{ asset('merchant/site/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('merchant/site/plugins/jquery-validation/jquery.validation.additional-rules.js')}}"></script>
<script src="{{ asset('merchant/site/plugins/toggle-password.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    var categorySubcategoryRoute = "{{ route('getSubcategories.ajax') }}";
    var merchantregistration= "{{ route('check.merchantregistration') }}";
    var merchantfreeregistration= "{{ route('merchant.freepayment') }}";
    var csrf = "{{ csrf_token() }}";
</script>
    <script src="{{ asset('merchant/site/js/merchant-register.js')}}"></script>
    <script src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
 $(document).ready(function() {
    $('#business_type_id').change(function() {
        var businessTypeId = $(this).val();

        if (businessTypeId != -1) {
            $.ajax({
                url: '/get-merchant-price/' + businessTypeId,
                type: 'GET',
                success: function(response) {
                    var businessprice = response.businessType;

                    if (businessprice.price) {
                        $('#membership_business_name').html('<span class="badge badge-success">' + businessprice.type + '</span>');
                        $('#merchant_price').html(businessprice.price);
                        $('#merchant_vatrate').html(businessprice.vat);
                        $('#subtotal-span-id').html(Math.round(businessprice.total_price));
                        $('#membership_bt').html('<span class="badge badge-success">' + businessprice.type + '</span>');
                        $('#merchant_currency').html('<span class="badge badge-success">GBP</span>');
                        $('#orderdescription').html('<span class="badge badge-success">Order for getting Winngoo Pages Membership</span>');
                        if(businessprice.total_price == '0.00'){
                        $('#subtotalbusiness').html('<span class="badge badge-success">Free</span>');
                        $('#sub_pay_total').html('<span class="badge badge-success d-none" id="pay_total">Free</span>');
                        $('#paymentsection').attr("style", "display:none");
                        $("a[href='#finish']").text("Submit");
                        }else{
                        $('#subtotalbusiness').html('<span class="badge badge-success"><span>£</span>' + Math.round(businessprice.total_price) + '</span>');
                        $('#sub_pay_total').html('<span class="badge badge-success d-none" id="pay_total">' + Math.round(businessprice.total_price) + '</span>');
                        $('#paymentsection').attr("style", "display:block");
                        $("a[href='#finish']").text("Proceed to Pay");
                        }

                    } else {
                        $('#merchant_price').html('<div class="alert alert-danger">Unable to fetch price</div>');
                    }
                },
                error: function() {
                    $('#merchant_price').html('<div class="alert alert-danger">Unable to fetch price</div>');
                }
            });
        }
    });

    $('#apply-coupon').click(function() {
        var couponCode = $('#coupon_code').val();

        if (couponCode) {
            $.ajax({
                url: '/validate-coupon',
                type: 'POST',
                data: {
                    _token: $('input[name="_token"]').val(),
                    coupon_code: couponCode,
                    business_type_id: $('#business_type_id').val()
                },
                success: function(response) {
                    if (response.valid) {
                        // Update the subtotal
                        var originalPrice = parseFloat($('#merchant_price').text());
                        var vat = parseFloat($('#merchant_vatrate').text());
                        var discountedPrice, subtotal;

                        if (response.discount_type == 'fixed') {
                            var discount = response.discount; // fixed amount
                            $('#discount-span-id').html('<div class="badge badge-danger" id="remove-coupon" style="font-size: 12px; cursor: pointer;">Remove Coupon</div><span>£</span>' + Math.round(discount));

                            discountedPrice = originalPrice - discount;
                            subtotal = discountedPrice + vat;
                        } else if (response.discount_type == 'percentage') {
                            var discountPercentage = response.discount; // percentage discount
                            var discountAmount = (discountPercentage / 100) * originalPrice;
                            $('#discount-span-id').html('<div class="badge badge-danger" id="remove-coupon" style="font-size: 12px; cursor: pointer;">Remove Coupon</div>' + Math.round(discountPercentage) + '%');

                            discountedPrice = originalPrice - discountAmount;
                            $('#discounted-price').html(Math.round(discountedPrice));

                            subtotal = discountedPrice + vat;
                        }

                        $('#subtotal-span-id').html(Math.round(subtotal));
                        $('#subtotalbusiness').html('<span class="badge badge-success"><span>£</span>' + Math.round(subtotal) + '</span>');
                        $('#sub_pay_total').html('<span class="badge badge-success d-none" id="pay_total">' + Math.round(subtotal) + '</span>');
                        $('#coupon_successmsg').html('Coupon code applied');
                        $('#coupon_successmsg').attr("style", "color:green");
                        setTimeout(function(){
                            $('#coupon_successmsg').html('');
                            $('#coupon_successmsg').removeAttr("style");
                            $('#coupon_code').val('');
                        }, 2500);
                    } else {
                        $('#coupon_errmsg').html('Invalid coupon code.');
                        $('#coupon_errmsg').attr("style", "color:red");
                        setTimeout(function(){
                            $('#coupon_errmsg').html('');
                            $('#coupon_errmsg').removeAttr("style");
                        }, 2500);
                    }
                },
                error: function() {
                    $('#coupon_errmsg').html('Unable to validate coupon.');
                    $('#coupon_errmsg').attr("style", "color:red");
                    setTimeout(function(){
                        $('#coupon_errmsg').html('');
                        $('#coupon_errmsg').removeAttr("style");
                    }, 2500);
                }
            });
        } else {
            $('#coupon_errmsg').html('Please enter a coupon code.');
            $('#coupon_errmsg').attr("style", "color:red");
            setTimeout(function(){
                $('#coupon_errmsg').html('');
                $('#coupon_errmsg').removeAttr("style");
            }, 2500);
        }
    });
});

//summernote
 $(document).ready(function() {
            $('#business_description').summernote({
                placeholder: 'Enter Business Description',
                tabsize: 2,
                height: 125,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
 });

$(function() {

    var $form = $(".require-validation");

    $('#pay-now').on('click', function(e) {
        var name = $('#name-on-card').val();
        var number = $('#card-number').val();
		var exp_month = $('#card_expiry_month').val();
		var exp_year = $('#card_expiry_year').val();
		var cvc = $('#card_cvc').val();
        var today = new Date();
        var price = $('#merchant_price').html();
        var vat_rate = $('#merchant_vatrate').html();
        var total_amount = $('#pay_total').html();
        var expDate = new Date(exp_year,(exp_month-1)); // JS Date Month is 0-11 not 1-12 grrr

		var regMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
		var regYear = /^2021|2022|2023|2024|2025|2026|2027|2028|2029|2030|2031|2032|2033|2034$/;
        if(name == '')
        {
        $("#card_name-error").text('Enter card holder name.');
        $("#namecard").removeAttr("style");
        $("#card_name-error").attr("style", "display:block");
        setTimeout(function() {
        $("#card_name-error").text('');
        $("#namecard").attr("style", "position:relative");
        $("#card_name-error").attr("style", "display:none");
        }, 3000);
        return false;
        }
         if(number == '')
        {
        $("#card_error").text('Enter card number.');
        $("#cardinput").removeAttr("style");
        $("#card_error").attr("style", "display:block");
        setTimeout(function() {
        $("#card_error").text('');
        $("#cardinput").attr("style", "position:relative");
        $("#card_error").attr("style", "display:none");
        }, 3000);
        return false;
        }else if(number != '')
			{
				if(number.length < 16)
				{
                     $("#card_error").text('Invalid Card Number.');
                    $("#cardinput").removeAttr("style");
                    $("#card_error").attr("style", "display:block");
                    setTimeout(function() {
                    $("#card_error").text('');
                    $("#cardinput").attr("style", "position:relative");
                    $("#card_error").attr("style", "display:none");
                    }, 3000);
				    return false;

				}

			}
        if(exp_month == '')
        {
        $("#card_expiry_month_error").text('Enter expiry month.');
        $(".fa-calendar-week").attr("style", "top: 30%");
        $("#card_expiry_month_error").attr("style", "display:block");
        setTimeout(function() {
        $("#card_expiry_month_error").text('');
        $("#card_expiry_month_error").attr("style", "display:none");
        $(".fa-calendar-week").removeAttr("style");
        }, 3000);
        return false;
        }else if(exp_month != '')
			{
				if (!regMonth.test(exp_month))
				{
				 $("#card_expiry_month_error").text('Invalid expiry month.');
                $(".fa-calendar-week").attr("style", "top: 30%");
                $("#card_expiry_month_error").attr("style", "display:block");
                setTimeout(function() {
                $("#card_expiry_month_error").text('');
                $("#card_expiry_month_error").attr("style", "display:none");
                $(".fa-calendar-week").removeAttr("style");
                }, 3000);
				}
			}
         if(exp_year == '')
        {
        $("#card_expiry_year_error").text('Enter expiry year.');
        $(".fa-calendar-days").attr("style", "top: 30%");
        $("#card_expiry_year_error").attr("style", "display:block");
        setTimeout(function() {
        $("#card_expiry_year_error").text('');
        $(".fa-calendar-days").removeAttr("style");
        $("#card_expiry_year_error").attr("style", "display:none");
        }, 3000);
        return false;
        }else if(exp_year != '')
			{
				if (!regYear.test(exp_year))
				{
				 $("#card_expiry_year_error").text('Invalid expiry year.');
                $(".fa-calendar-days").attr("style", "top: 30%");
                $("#card_expiry_year_error").attr("style", "display:block");
                setTimeout(function() {
                $("#card_expiry_year_error").text('');
                $(".fa-calendar-days").removeAttr("style");
                $("#card_expiry_year_error").attr("style", "display:none");
                }, 3000);
                return false;
				}
			}
        if(cvc == '')
        {
        $("#card_cvc_error").text('Enter cvc number.');
        $(".fa-lock").attr("style", "top: 30%");
        $("#card_cvc_error").attr("style", "display:block");
        setTimeout(function() {
        $("#card_cvc_error").text('');
        $(".fa-lock").attr("style", "top: 30%");
        $("#card_cvc_error").attr("style", "display:none");
        }, 3000);
        return false;
        }else if(cvc != '')
			{
				if(cvc.length < 3)
				{
				    $("#card_cvv_error").text('Invalid CVV/CVC.');
                $(".fa-lock").attr("style", "top: 30%");
                $("#card_cvc_error").attr("style", "display:block");
                setTimeout(function() {
                $("#card_cvc_error").text('');
                $(".fa-lock").attr("style", "top: 30%");
                $("#card_cvc_error").attr("style", "display:none");
                }, 3000);

				}

			}


        var inputSelector = ['input[type=email]', 'input[type=password]',
        'input[type=text]', 'input[type=file]',
        'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');

        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });

        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }

    });
 // Function to disable all <a> tags inside the <ul>
    function disableLinks() {
        $('ul[role="tablist"] a').each(function() {
            $(this).addClass('disabled').attr('tabindex', '-1').attr('aria-disabled', 'true');
        });

        $('ul[role="tablist"] li').each(function() {
            $(this).attr('aria-disabled', 'true').addClass('disabled');
        });
    }
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
                  $("#paymentfail").attr("style", "display:block");
                    $("#paymentfail").text(response.error.message);
                     setTimeout(function(){
                $('#paymentfail').html('');
                $('#paymentfail').removeAttr("style");
                $("#paymentfail").attr("style", "display:none");
            }, 8000);
        } else {
            var token = response['id'];
            var csrfToken = $('input[name=_token]').val();
             var name = $('#name-on-card').val();
            var number = $('#card-number').val();
            var exp_month = $('#card_expiry_month').val();
            var exp_year = $('#card_expiry_year').val();
            var cvc = $('#card_cvc').val();
            var today = new Date();
            var price = $('#merchant_price').html();
            var vat_rate = $('#merchant_vatrate').html();
            var total_amount = $('#pay_total').html();
            $("a[href='#finish']").text("Processing, Please Wait").addClass("disabled").off('click');
            $.ajax({
                url: "{{ route('merchant.payment') }}",
                method: 'post',
                data: {
                    stripeToken: token,_token: csrfToken, name: name, number: number, exp_month: exp_month, exp_year: exp_year, cvc: cvc, price:price, vat_rate:vat_rate,total_amount: total_amount
                },
                success: function(response) {
                    disableLinks();
                    $("#paycreditpage").hide();
                    $("#payscesspage").attr("style", "display:block");
                    $("#tab-header-text").hide();
                    $('ul[aria-label="Pagination"]').remove();
                    $('#payment_status').html(response.message);
                },
                error: function(error) {
                     $("#paymentfail").attr("style", "display:block");
                    $("#paymentfail").text("Payment Failed.");
                     setTimeout(function(){
                $('#paymentfail').html('');
                $('#paymentfail').removeAttr("style");
                $("#paymentfail").attr("style", "display:none");
                 $("a[href='#finish']").text("Proceed to Pay").removeClass("disabled").off('click').on('click', function() {
                });

            }, 8000);
                }
            });
        }
    }

});
</script>



<script>
      $(document).on('click', '.search-toggle', function(e) {
        var selector = $(this).data('selector');
        $(selector).toggleClass('search-box-show').find('.search-input').focus();
        $(this).toggleClass('active');
        $(this).find('i').toggleClass('fa-search fa-times', 400);
        e.preventDefault();
      });
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

    })(jQuery);

 $(document).ready(function() {
            $('#category').on('change', function() {
                if ($(this).val().includes('19')) { // Value '19' corresponds to "Others"
                    $('#otherCategoryDiv').show();
                    $('#sub_category').removeAttr("required");
                } else {
                    $('#otherCategoryDiv').hide();
                    $('#sub_category').attr("required");
                }
            });
            $('#sub_category').on('change', function() {
                if ($(this).val().includes('5')) { // Value '5' corresponds to "Others"
                    $('#othersubCategoryDiv').show();
                } else {
                    $('#othersubCategoryDiv').hide();
                }
            });
        });

$(document).on('click', '#remove-coupon', function() {
            // Reset the UI to the original state
            var originalPrice = parseFloat($('#merchant_price').text());
            var vat = parseFloat($('#merchant_vatrate').text());

            $('#discount-span-id').html('0.00');
            $('#discounted-price').html('0.00');
            $('#subtotal-span-id').html(Math.round(originalPrice + vat));
            $('#subtotalbusiness').html('<span class="badge badge-success"><span>£</span>' + Math.round(originalPrice + vat) + '</span>');
            $('#sub_pay_total').html('<span class="badge badge-success d-none" id="pay_total">' + Math.round(originalPrice + vat) + '</span>');



            // Clear coupon code input field
            $('#coupon_code').val('');
            $('#coupon_successmsg').html('Coupon code removed');
            $('#coupon_successmsg').attr("style", "color:green");
            setTimeout(function(){
                $('#coupon_successmsg').html('');
                $('#coupon_successmsg').removeAttr("style");
            }, 2500);
        });

</script>
</body>

</html>
