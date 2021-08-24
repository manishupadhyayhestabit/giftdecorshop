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
  <span class="font-weight-bold ml-3 h6 mb-0">Varify Email?</span>
  <a class="toggle ml-auto" href="javascript:void(0)"><i class="icofont-navigation-menu"></i></a> 
  </div>
  <div class="osahan-form p-3 text-center my-3">
    <h2>Resend email varification? </h2>
    <p>{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>
    @if (session('message') == 'Verification link sent!')
            <div class="alert alert-success" role="alert">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif
    <div class="d-flex justify-content-between">
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
      <button type="submit" class="btn btn-success btn-block btn-md">Resend</button>
    </form>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger btn-block btn-md">{{ __('Log Out') }}</button>
    </form>
    </div>
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