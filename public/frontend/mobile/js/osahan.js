(function ($) {
  "use strict"; // Start of use strict

  $("body").on("contextmenu", function (e) {
    return false;
  });
  $(document).keydown(function (e) {
    if (e.ctrlKey && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 || e.keyCode === 117)) {
      return false;
    }
    if (e.which === 123) {
      return false;
    }
    if (e.metaKey) {
      return false;
    }
    //document.onkeydown = function(e) {
    // "I" key
    if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
      return false;
    }
    // "J" key
    if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
      return false;
    }
    // "S" key + macOS
    if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
      return false;
    }
    if (e.keyCode == 224 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
      return false;
    }
    // "U" key
    if (e.ctrlKey && e.keyCode == 85) {
      return false;
    }
    // "F12" key
    if (event.keyCode == 123) {
      return false;
    }
  });

  // Tooltip
  $('[data-toggle="tooltip"]').tooltip();

  // Osahan Slider
  $('.osahan-slider').slick({
    centerMode: false,
    slidesToShow: 1,
    arrows: false,
    dots: true
  });

  // Promo Slider
  $('.promo-slider').slick({
    centerMode: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    arrows: false,
    adaptiveHeight: true
  });

  // Recommend Slider
  $('.recommend-slider').slick({
    centerMode: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true,
    arrows: false,
    autoplay: true
  });

  $('.autoplay').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    arrows: false,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 769,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  // Trending Slider
  $('.trending-slider').slick({
    centerPadding: '30px',
    slidesToShow: 3,
    autoplay: true,
    arrows: false,
    autoplaySpeed: 5000,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1
        }
      }
    ]
  });

  // Sidebar
  var $main_nav = $('#main-nav');
  var $toggle = $('.toggle');

  var defaultOptions = {
    disableAt: false,
    customToggle: $toggle,
    levelSpacing: 40,
    navTitle: '',
    levelTitles: true,
    levelTitleAsBack: true,
    pushContent: '#container',
    insertClose: 2
  };

  // call our plugin
  var Nav = $main_nav.hcOffcanvasNav(defaultOptions);


})(jQuery); // End of use strict
