// Custom scripts file

jQuery(document).ready(function ($) {

  'use strict';

  // Generic function that runs on window resize.
  function resizeStuff() {
    slider();
  }


  // Runs function once on window resize.
  var TO = false;
  $(window).resize(function () {
    if (TO !== false) {
      clearTimeout(TO);
    }

    // 200 is time in miliseconds.
    TO = setTimeout(resizeStuff, 200);
  }).resize();


  // Main Menu Toggle
  var menuButton = $('.main-menu-button');

  menuButton.on('click', function() {
    if ($('.main-menu').hasClass('is-active')) {
      $('.main-menu').removeClass('is-active');
      $(this).removeClass('is-active');
    }
    else {
      $('.main-menu').addClass('is-active');
      $(this).addClass('is-active');
    }
  });

  // Change menu button color after hero
  if ($('body').hasClass('page-homepage')) {
    $('.main-menu-button').addClass('is-white');

    var controller = new ScrollMagic.Controller();

    var menuButtonScene = new ScrollMagic.Scene({
      offset: 0, // offset trigger position by 100px
      triggerElement: '.featured-text', // what will trigger scene
      triggerHook: 0, // 0=top, 0.5=middle, 1=bottom
      reverse: true, // plays scene on the way up?
    })
    .on('start', function () {
      $('.main-menu-button').toggleClass('is-white');
    })
    .addTo(controller);
  }

  // Slider Gallery
  var slider = function() {
    $('.slider').slick({
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      centerMode: true,
      variableWidth: true,
      responsive: [
        {
          breakpoint: 700,
          settings: "unslick"
        }
      ]
    });
  }
  
  slider();

  


})(jQuery);
