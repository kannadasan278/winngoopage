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
                         <div class="bg-pattern flex-box register">
                    <div class="brand-name">
                        <h1><a href="#"><img src="{{asset('customer/assets/images/new/logo-white.svg')}}" class="header-logo img-fluid"></a></h1>
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
                            <a href="{{ route('merchant.franchise') }}" title=""><button type="button" class="btn btn-danger waves-effect waves-light">Go Back</button></a>
                        </div>

                        <div class="flex-box-3 register form-section">

                            <h2>Add New Franchise</h2>

<!-- HTML Form -->

                        <div class="register-form">
                            <div class="alert alert-success bg-success text-white" id="merchant_success" style="display: none;" role="alert">

                                                </div>
                <form autocomplete="off" action="{{ route('merchant.processfranchise') }}" method="POST" class="form-signin" role="form" id="merchant-signup-form" enctype="multipart/form-data">
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
                                                <span>Give dashboard access to this franchise
                                                </span>
                                            </label>
                                        </span>
                                   </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label for="business_type" class="text-capitalize">Choose your Business Type<span class="text-danger"> *</span></label>
                                   <select name="business_type_id" id="business_type_id" class="form-control" disabled>
                                    <option value="-1" disabled {{ $selectedBusinessTypeId == -1 ? 'selected' : '' }}>Select a Business Type</option>
                                    @foreach($merchantprice as $type)
                                        <option value="{{ $type->id }}" {{ $type->id == $selectedBusinessTypeId ? 'selected' : '' }}>
                                            {{ $type->type }} {{ $type->type == 'Francise/Multi Business' ? '- (' . $type->range . ')' : '' }}
                                        </option>
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
                                                    multiple="multiple">
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
    <script src="{{ asset('merchant/site/js/franchise.js')}}"></script>
    <script src="https://js.stripe.com/v2/"></script>



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



</script>
</body>

</html>
