(function ($, root, undefined) {

	$(function () {
		var enableScroll = true;
		var scrollHighlights = false;
		var step = 1;
		var stepsDisplayed = false;
		'use strict';
		function searchPost(terms){
			if(terms != ''){
				$.ajax({
	            type: "POST",
	            dataType: "html",
	            url: the_ajax_script.ajaxurl,
							data: {
									 'action': 'search_post_ajax',
									 'terms': terms
								},
	            success: function (data) {
									$('.search .results').addClass('show');
									 searchResults(JSON.parse(data));
	            },
	            error: function (jqXHR, textStatus, errorThrown) {
	                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
	            }

	        });
			} else {
				$('.search .results').html('');
			}

		}

		function searchResults(results){
			var html = '';
			var url = $(location).attr('hostname');
			console.log(results);
			results.forEach(result =>{
				html += '<div class="post"><a href="'+ result.guid +'"><div class="featured-image"></div><h4>'+result.post_title+'</h4><p>'+ $(result.post_content).text().slice(0, 180)+'...</p></a></div>'
			});
			$('.search .results').html(html);
		}
    $(document).on('click', '.mobile-nav-toggle', function(e){
        e.preventDefault();
        $('.mobile-nav').toggleClass('open');
				$("body").toggleClass("disableScroll");
    });
		$(window).scroll(function() {
				var scroll = $(window).scrollTop();
				if (scroll >= 900) {
						$("header").addClass("scrolled");
						$("section.banner").addClass("scrolled");

				} else {
						$("header").removeClass("scrolled");
						$("section.banner").removeClass("scrolled");
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
				} else if ($('body.single-works').length > 0){
					var scroll = $(window).scrollTop();
					var pineProcess = $(".pine-process").offset().top - 200;
					var width = $(window).width();
					if (scroll >= pineProcess && scroll <= (pineProcess + $(".pine-process").height()) && width > 768 ) {
							enableScroll = false;
					}
				} else if ($('body.home').length > 0){
					var scroll = $(window).scrollTop();
					var highlight = $(".content.highlight").offset().top - 150;
					var width = $(window).width();

					if (scroll >= highlight && scroll <= (highlight + $(".content.highlight").height()) && width > 768 ) {
							scrollHighlights = true;
							console.log('highlight');
					}
				}
			});
		$(window).bind('mousewheel DOMMouseScroll', function(event){
				if ($('body.about').length > 0 || $('body.single-works').length > 0){
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
		$(window).bind('mousewheel DOMMouseScroll', function(event){
			if ($('body.home').length > 0){
				if(scrollHighlights){
					$("body").addClass("disabled");
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
						scrollHighlights = false;
						step = 0;
					} else {
							$("body").addClass("disabled");
							if(step <= 30){
								$('.slides .wrapper').removeClass('one two three four').addClass('one');
							} else if(step >= 30 && step <= 60){
								$('.slides .wrapper').removeClass('one two three four').addClass('two');
							} else if(step >= 60 &&  step <= 90){
								$('.slides .wrapper').removeClass('one two three four').addClass('three');
							} else if(step >= 90 && step <= 120){
								$('.slides .wrapper').removeClass('one two three four').addClass('four');
							} else if(step > 120){
								$("body").removeClass("disabled");
								scrollHighlights = false;
								step = 120;
							}

					}
				}
			}
		});
		$(window).click(function() {
			$('.search .wrapper').removeClass('wider');
			$('.search .results').removeClass('show');
		});
		$(document).on('click', '.search .wrapper', function(e){
				e.stopPropagation();
	      $(this).addClass('wider');
	  });
		$( "#search-term" ).keyup(function() {
			   searchPost($(this).val());
		});

  });

})(jQuery, this);
