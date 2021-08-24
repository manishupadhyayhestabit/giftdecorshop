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
<div class="osahan-signup">
  <div class="border-bottom p-3 d-flex align-items-center"> 
    <a class="font-weight-bold text-success text-decoration-none" onclick="window.history.go(-1); return false;" href="javascript:void(0)"><i class="icofont-rounded-left back-page"></i></a>
    <span class="font-weight-bold ml-3 h6 mb-0">Register</span>
    <a class="toggle ml-auto" href="javascript:void(0)"><i class="icofont-navigation-menu"></i></a> </div>
  <div class="p-3">
    <h2 class="my-0">Let's get started</h2>
    <p>Create account to see our top picks for you!</p>
     @if ($errors->any())
        <div class="text-danger">{{ __('Whoops! Something went wrong.') }}</div>
        <ul class="text-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
      @endif
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input placeholder="Enter Name" type="text" class="form-control" id="name" name="name" :value="old('name')" required autofocus autocomplete="name" />
      </div>
      <div class="form-group">
        <label for="mobile">Mobile Number</label>
        <input placeholder="Enter Mobile Number" type="number" class="form-control" id="mobile" name="mobile" :value="old('mobile')" required autofocus autocomplete="mobile" />
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input placeholder="Enter Email" class="form-control" id="email" type="email" name="email" :value="old('email')" required />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input placeholder="Enter Password" class="form-control" id="password" type="password" name="password" required autocomplete="new-password" />
      </div>
      <div class="form-group">
        <label for="password_confirmation">Confirmation Password</label>
        <input placeholder="Enter Confirmation Password" class="form-control" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
      </div>
      @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
        <div class="custom-control custom-checkbox mb-3">
            <input class="custom-control-input" type="checkbox" name="terms" id="terms">
            <label class="custom-control-label small pt-1" for="terms">{!! __('I agree to the :terms_of_service and :privacy_policy', [
            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
            ]) !!}</label>
        </div>
      @endif
      <button type="submit" class="btn btn-success rounded btn-lg btn-block">Create Account</button>
    </form>
    <p class="text-muted text-center small py-2 m-0">or</p>
    <a href="javascript:void(0)" class="btn btn-info btn-block rounded btn-lg"> <i class="icofont-facebook mr-2"></i> Sign up with Apple </a> 
    <a href="javascript:void(0)" class="btn btn-light btn-block rounded btn-lg btn-google"> <i class="icofont-google-plus text-danger mr-2"></i> Sign up with Google </a> </div>
</div>
<div class="osahan-fotter fixed-bottom"> <a href="{{ route('login') }}" class="btn btn-block btn-lg bg-white">Don't have an account? Sign in</a> </div>
@livewire('app.mobile.menu-component')
<script src="{{ asset('frontend/mobile/vendor/jquery/jquery.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('frontend/mobile/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('frontend/mobile/vendor/slick/slick.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('frontend/mobile/vendor/sidebar/hc-offcanvas-nav.js') }}" type="text/javascript"></script> 
<script src="{{ asset('frontend/mobile/js/osahan.js') }}" type="text/javascript"></script>
@livewireScripts
</body>
</html>