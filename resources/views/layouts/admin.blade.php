<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<title>{{ config('app.name', 'Giftdecorshop.com') }} Admin Panel</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/fontawesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/line-icons/simple-line-icons.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/summernote/summernote.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('plugins/datatables/css/jquery.datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/jquery-colorbox-1.6.4/example5/colorbox.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/css/modern.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/css/custom.css') }}" rel="stylesheet" type="text/css" />
@livewireStyles
<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/uniform/jquery.uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/jquery-colorbox-1.6.4/jquery.colorbox-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/summernote/summernote.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/modern.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/adminScript.js') }}"></script>
@livewireScripts
<!-- Javascripts -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="page-header-fixed compact-menu page-horizontal-bar page-sidebar-fixed">
<main class="page-content content-wrap"> 
  <!-- AdminTop -->
   @livewire('admin.topbar-component')
  <!-- Navbar -->
  @livewire('admin.admin-menu-bar-component')
  <!-- Page Content -->
  <div class="page-inner" style="min-height:50px !important">
    
      {{ $slot }}

  <div class="clearfix"></div>
  <div class="page-footer">
    <div class="container">
      <p class="text-center m-t-xs text-sm">2017 © Store by GiftDecorShop.com.</p>
      <p class="text-center m-t-xs text-sm"> Version 2.3.0.2</p>
    </div>
  </div>
</div>
</main>
</body>
</html>
