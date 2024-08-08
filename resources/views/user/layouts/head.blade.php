<head>

        <meta charset="utf-8" />
        <title>Winngoo Page Super Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('merchant/svg/winngooLogo-CfTYVdk8.svg')}}">

        <!-- Bootstrap Css -->
        <link href="{{asset('merchant/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('merchant/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('merchant/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
         @stack('styles')
</head>
