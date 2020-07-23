(function ($, root, undefined) {

	$(function () {
		var enableScroll = true;
		var step = 1;
		var stepsDisplayed = false;
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


			$(window).scroll(function() {
				if ($('body.about').length > 0){
					var scroll = $(window).scrollTop();
					var pineProcess = $(".pine-process").offset().top - 200;
					var width = $(window).width();
					if (scroll >= pineProcess && scroll <= (pineProcess + $(".pine-process").height()) && width > 768 ) {
							enableScroll = false;
					}
				}
			});

			$(window).bind('mousewheel DOMMouseScroll', function(event){
				if ($('body.about').length > 0){
					if(!enableScroll){

						var stepAnimation = 'in';
						if (event.originalEvent.wheelDelta > 0 || event.originalEvent.detail < 0) {
									step = step - 1;
									stepAnimation = 'out';
									console.log(step + ' up');
						} else {
								step = step + 1;
								stepAnimation = 'in';
						}

						if(step < 1){
							$("body").removeClass("disabled");
							enableScroll = true;
							step = 0;
						} else {
							if(!stepsDisplayed){
								$("body").addClass("disabled");
								if(step <= 30){
									$('.step').removeClass('active');
									$('.step').removeClass('in');
									$('.step').removeClass('out');
									$('.step:nth-child(1)').css('opacity', '1');
									$('.step:nth-child(1)').addClass('active');
									$('.step:nth-child(2)').css('opacity', '0');
									$('.step:nth-child(1)').addClass(stepAnimation);
								} else if(step >= 30 && step <= 60){
									$('.step').removeClass('active');
									$('.step').removeClass('in');
									$('.step').removeClass('out');
									$('.step:nth-child(2)').css('opacity', '1');
									$('.step:nth-child(2)').addClass('active');
									$('.step:nth-child(3)').css('opacity', '0');
									$('.step:nth-child(2)').addClass(stepAnimation);
								} else if(step >= 60 &&  step <= 90){
									$('.step').removeClass('active');
									$('.step').removeClass('in');
									$('.step').removeClass('out');
									$('.step:nth-child(3)').css('opacity', '1');
									$('.step:nth-child(3)').addClass('active');
									$('.step:nth-child(4)').css('opacity', '0');
									$('.step:nth-child(3)').addClass(stepAnimation);
								} else if(step >= 90 && step <= 120){
									$('.step').removeClass('active');
									$('.step').removeClass('in');
									$('.step').removeClass('out');
									$('.step:nth-child(4)').css('opacity', '1');
									$('.step:nth-child(4').addClass('active');
									$('.step:nth-child(4)').addClass(stepAnimation);
									$("body").removeClass("disabled");
								} else if(step > 120){
									$("body").removeClass("disabled");
									enableScroll = true;
									stepsDisplayed = true;
									step = 120;
								}
							}
						}
					}
					// console.log(step);
					// console.log(enableScroll);
				}
			});
  });

})(jQuery, this);
