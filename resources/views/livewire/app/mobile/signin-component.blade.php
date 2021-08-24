<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
<title>Gift Decor Shop</title>
<link href="{{ asset('frontend/mobile/vendor/slick/slick.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('frontend/mobile/vendor/slick/slick-theme.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('frontend/mobile/vendor/icons/icofont.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('frontend/mobile/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/mobile/vendor/sidebar/hc-offcanvas-nav.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/mobile/css/style.css') }}" rel="stylesheet">
@livewireStyles
</head>
<body class="fixed-bottom-padding">
<div class="osahan-signin">
  <div class="border-bottom p-3 d-flex align-items-center"> 
    <a class="font-weight-bold text-success text-decoration-none" onclick="window.history.go(-1); return false;" href="javascript:void(0)"><i class="icofont-rounded-left back-page"></i></a>
    <span class="font-weight-bold ml-3 h6 mb-0">Login</span> 
    <a class="toggle ml-auto" href="javascript:void(0)"><i class="icofont-navigation-menu"></i></a> </div>
  <div class="p-3">
    <h2 class="my-0">Welcome Back</h2>
    <p class="small">Sign in to Continue.</p>
    <form method="POST" action="{{ route('login') }}">
        @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" name="email" :value="old('email')" class="form-control" required autofocus placeholder="Email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" required class="form-control" autocomplete="current-password" placeholder="Password">
      </div>
      <div class="mb-3 d-flex justify-content-between">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" name="remember" id="remember_me" class="custom-control-input">
          <label for="remember_me" class="custom-control-label small pt-1">{{ __('Remember me') }}</label>
        </div>
        <a href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a> </div>
      <button type="submit" class="btn btn-success btn-lg rounded btn-block">{{ __('Sign in') }}</button>
    </form>
    <p class="text-muted text-center small m-0 py-3">or</p>
    <a href="javascript:void(0)" class="btn btn-block rounded btn-lg btn-info"> <i class="icofont-facebook mr-2"></i> Sign up with Facebook </a> 
    <a href="javascript:void(0)" class="btn btn-light btn-block rounded btn-lg btn-google"> <i class="icofont-google-plus text-danger mr-2"></i> Sign up with Google </a> </div>
</div>
<div class="osahan-fotter fixed-bottom"> <a href="{{ route('register') }}" class="btn btn-block btn-lg bg-white">Don't have an account? Sign up</a> </div>
@livewire('app.mobile.menu-component')
<script src="{{ asset('frontend/mobile/vendor/jquery/jquery.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('frontend/mobile/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('frontend/mobile/vendor/slick/slick.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('frontend/mobile/vendor/sidebar/hc-offcanvas-nav.js') }}" type="text/javascript"></script> 
<script src="{{ asset('frontend/mobile/js/osahan.js') }}" type="text/javascript"></script>
@livewireScripts
</body>
</html>