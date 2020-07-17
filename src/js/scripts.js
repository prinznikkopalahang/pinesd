(function ($, root, undefined) {

	$(function () {

		'use strict';
    $(document).on('click', '.mobile-nav-toggle', function(e){
        e.preventDefault();
        $('.mobile-nav').toggleClass('open');
				$("body").toggleClass("disableScroll");
    });

		$(window).scroll(function() {
		    var scroll = $(window).scrollTop();

		    if (scroll >= 900) {
		        $("header").addClass("scrolled");

		    } else {
		        $("header").removeClass("scrolled");
		    }
		});

  });

})(jQuery, this);
