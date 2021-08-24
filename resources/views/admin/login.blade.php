<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<!-- Title -->
<title>{{ config('app.name', 'Giftdecorshop.com') }} Admin Panel</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Styles -->
<link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<!-- Theme Styles -->
<link href="{{ asset('backend/css/modern.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('backend/css/custom.css') }}" rel="stylesheet" type="text/css"/>
</head>
<body class="page-login">
<main class="page-content">
  <div class="page-inner">
    <div id="main-wrapper">
      <div class="row">
        <div class="col-md-3 center">
          <div class="login-box"> <a href="#" class="logo-name text-lg text-center">{{ config('app.name', 'Giftdecorshop.com') }}</a>
            <p class="text-center m-t-md">Please login into your admin Panel.</p>
            <x-jet-validation-errors class="mb-4" />
           <form class="m-t-md" method="post" action="{{ route('login') }}">
             @csrf
              <div class="form-group"> 
              <input type="text" name="email" id="email" :value="old('email')" required autofocus class="form-control" placeholder="Email Address">                              
              </div>
              <div class="form-group"> 
              <input type="password" name="password" id="password" required autocomplete="current-password" class="form-control" placeholder="Password">                              
              </div>
              <button type="submit" class="btn btn-success btn-block">Login</button>
             </form>
            <p class="text-center m-t-xs text-sm">2017 © Admin Panel by {{ config('app.name', 'Giftdecorshop.com') }}.</p>
          </div>
        </div>
      </div>
      <!-- Row --> 
    </div>
    <!-- Main Wrapper --> 
  </div>
  <!-- Page Inner --> 
</main>
<!-- Page Content --> 
<!-- Javascripts --> 
<script src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script> 
<script src="{{ asset('backend/js/adminScript.js') }}"></script> 

</body>
</html>