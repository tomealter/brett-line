// Custom scripts file

(function ($) {

  // Main Menu Toggle
  var menuButton = $('.main-menu-button');

  menuButton.on('click', function() {
    $('.main-menu').toggleClass('is-active');
  });


})(jQuery);
