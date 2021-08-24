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
<link href="{{ asset('plugins/autocomplete/easy-autocomplete.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/mobile/css/style.css') }}" rel="stylesheet">
@livewireStyles
</head>
<body class="fixed-bottom-padding">
  
{{$slot}}

@livewire('app.mobile.menu-component')
<script src="{{ asset('frontend/mobile/vendor/jquery/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/mobile/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('frontend/mobile/vendor/slick/slick.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('frontend/mobile/vendor/sidebar/hc-offcanvas-nav.js') }}" type="text/javascript"></script> 
<script src="{{ asset('frontend/mobile/js/osahan.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/mobile/js/alpine.min.js') }}" defer></script>
<script src="{{ asset('plugins/autocomplete/jquery.easy-autocomplete.min.js') }}" type="text/javascript"></script>
@livewireScripts
<script type="text/javascript">
var option = {
   url: "{{ url('storage/data/pincode.json') }}",
   getValue: "address",
   placeholder: false,
   theme: "square",
   highlightPhrase: true,
   list: {
		match: {
         method: function(element, phrase) {
                  return element.indexOf(phrase) === 0;
               },
			enabled: true
		}
	}
};
$("#pincode").easyAutocomplete(option);
</script>
@stack('scripts')
</body>
</html>