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
<div class="osahan-verification">
  <div class="border-bottom p-3 d-flex align-items-center"> 
  <a class="font-weight-bold text-success text-decoration-none" onclick="window.history.go(-1); return false;" href="javascript:void(0)"><i class="icofont-rounded-left back-page"></i></a> 
  <span class="font-weight-bold ml-3 h6 mb-0">Forgot password?</span>
  <a class="toggle ml-auto" href="javascript:void(0)"><i class="icofont-navigation-menu"></i></a> 
  </div>
  <div class="osahan-form p-3 text-center my-3">
    <h2>Password Reset Link Send? </h2>
    <p>Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group">
            <input type="email" name="email" :value="old('email')" class="form-control" required autofocus placeholder="Email">
        </div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
      
      <button type="submit" class="btn btn-success btn-block btn-lg fixed-bottom">
    Email Password Reset Link</button>
    </form>
  </div>
</div>@livewire('app.mobile.menu-component')
<script src="{{ asset('frontend/mobile/vendor/jquery/jquery.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('frontend/mobile/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('frontend/mobile/vendor/slick/slick.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('frontend/mobile/vendor/sidebar/hc-offcanvas-nav.js') }}" type="text/javascript"></script> 
<script src="{{ asset('frontend/mobile/js/osahan.js') }}" type="text/javascript"></script>
@livewireScripts
</body>
</html>