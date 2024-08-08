<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Winngoo Page || Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('backend/svg/winngooLogo-CfTYVdk8.svg')}}">
    <link href="{{asset('backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
</head>
<body data-topbar="colored">
    <div class="account-pages"></div>
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">
                <div class="auth-logo">
                    <h3 class="text-center">
                        <a href="#" class="logo d-block my-4">
                            <img src="{{asset('backend/images/logo-dark.png')}}" class="logo-dark mx-auto" height="" alt="logo-dark">
                        </a>
                    </h3>
                </div>
                <div class="p-3">
                    <h4 class="text-muted font-size-18 text-center">Administrator!</h4>
                    <p class="text-muted text-center">Sign in to continue to Winngoo page.</p>
                    <div id="alert" class="alert alert-danger bg-danger text-white mb-0" style="display: none;"></div>
                    <form class="form-horizontal" id="login-form" action="{{ route('admin.login.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" id="exampleInputEmail1" name="email" class="form-control form-control-user" placeholder="Enter Username..." autofocus>
                            <span class="invalid-feedback" id="email-error" role="alert" style="display: none;"></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="userpassword">Password</label>
                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password" autocomplete="current-password">
                            <span class="invalid-feedback" id="password-error" role="alert" style="display: none;"></span>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customControlInline">
                                    <label class="form-check-label" for="customControlInline">Remember me</label>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-12">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center">
            <p class="text-muted">©<script>document.write(new Date().getFullYear())</script> winngoo All rights reserved</p>
        </div>
    </div>
    <div class="rightbar-overlay"></div>
    <script src="{{asset('backend/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('backend/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('backend/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('backend/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('backend/js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script>

       $("#login-form").validate({
                rules: {
                    email: {
                        required: true,
                    },
                    password: {
                        required: true,
                        minlength: 8
                    }
                },
                messages: {
                    email: {
                        required: "Please enter your username",
                        email: "Please enter a valid username"
                    },
                    password: {
                        required: "Please enter your password",
                        minlength: "Your password must be at least 8 characters long"
                    }
                },

            });
    $(document).ready(function () {
        $('#login-form').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function (response) {
                    console.log(response);
                    if (response.success) {
                        $('#message').html('<div class="alert alert-success">' + response.message + '</div>');
                        window.location = '{{ route("admin") }}';
                    } else {
                        $('#message').html('<div class="alert alert-danger">' + response.message + '</div>');
                    }
                },
                error: function (xhr) {
                    var errors = xhr.responseJSON.errors;
                    var message = xhr.responseJSON.message;
                    if(message === 'Invalid email and password'){
                         $("#alert").text(message).show();
                                 setTimeout(function() {
                            $("#alert").hide();
                        }, 5000);
                    }
                    var errorMessage = '';
                    $.each(errors, function (key, value) {
                        errorMessage += '<div class="alert alert-danger">' + value + '</div>';
                    });
                    $('#message').html(errorMessage);
                }
            });
        });
    });
</script>

</body>
</html>
