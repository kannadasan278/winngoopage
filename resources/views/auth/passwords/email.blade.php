<!DOCTYPE html>
<html lang="en">

<head>
@include('backend.layouts.head')

</head>

<body class="bg-gradient-primary">
     <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <div class="auth-logo">
                        <h3 class="text-center">
                            <a href="index.html" class="logo d-block my-4">
                                <img src="{{asset('backend/images/logo-dark.png')}}" class="logo-dark mx-auto"  alt="logo-dark">
                            </a>
                        </h3>
                    </div>

                    <div class="p-3">
                        <h4 class="text-muted font-size-18 mb-3 text-center">Forgot Your Password?</h4>
                        <div class="alert alert-info" role="alert">
                            We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!
                        </div>

                         @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  <form class="user"  method="POST" action="{{ route('password.email') }}">
                    @csrf

                            <div class="mb-3">
                                <label class="form-label" for="useremail">Email</label>
                                <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            </div>

                            <div class="mb-3 row">
                                <div class="col-12 text-end">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

            <div class="text-center">
                    <a class="" href="{{route('login')}}">Already have an account? Login!</a>
                           <p class="text-muted">©<script>document.write(new Date().getFullYear())</script> winngoo All rights reserved</p>

            </div>

        </div>



</body>

</html>
