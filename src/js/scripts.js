(function ($, root, undefined) {

	$(function () {

		'use strict';
    $(document).on('click', '.mobile-nav-toggle', function(e){
        e.preventDefault();
        $('.mobile-nav').toggleClass('open');
    });
  });

})(jQuery, this);
