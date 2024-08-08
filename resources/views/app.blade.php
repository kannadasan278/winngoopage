<!DOCTYPE html>
<html lang="en">
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
    @yield('content')

    <!-- Include script sections -->
    @yield('scripts')
</body>
</html>
