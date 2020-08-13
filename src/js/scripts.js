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
		function animatePineProcess(){

			if(!stepsDisplayed){
				stepsDisplayed = true;
				setTimeout(function(){
					$('.step').removeClass('active');
					$('.step').removeClass('in');
					$('.step:nth-child(1)').css('opacity', '1');
					$('.step:nth-child(1)').addClass('active');
					$('.step:nth-child(1)').addClass('in');
				}, 500);

				setTimeout(function(){
					$('.step').removeClass('active');
					$('.step').removeClass('in');
					$('.step:nth-child(2)').css('opacity', '1');
					$('.step:nth-child(2)').addClass('active');
					$('.step:nth-child(2)').addClass('in');
				}, 1300);
				setTimeout(function(){
					$('.step').removeClass('active');
					$('.step').removeClass('in');
					$('.step:nth-child(3)').css('opacity', '1');
					$('.step:nth-child(3)').addClass('active');
					$('.step:nth-child(3)').addClass('in');
				}, 2100);
				setTimeout(function(){
					$('.step').removeClass('active');
					$('.step').removeClass('in');
					$('.step:nth-child(4)').css('opacity', '1');
					$('.step:nth-child(4)').addClass('active');
					$('.step:nth-child(4)').addClass('in');

				}, 2900);
			}

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
					var pineProcess = $(".pine-process").offset().top - 900;
					var width = $(window).width();
					if (scroll >= pineProcess && scroll <= (pineProcess + $(".pine-process").height()) && width > 768 ) {
							// enableScroll = false;
							animatePineProcess();
					}
				} else if ($('body.single-works').length > 0){
					var scroll = $(window).scrollTop();
					var pineProcess = $(".pine-process").offset().top - 600;
					var width = $(window).width();
					if (scroll >= pineProcess && scroll <= (pineProcess + $(".pine-process").height()) && width > 768 ) {
							// enableScroll = false;
							animatePineProcess();
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
		$(document).on('click', 'nav li.contact-footer a', function(event){
			event.preventDefault();
			console.log('Clicked Contact Us');
			if (this.hash !== "") {
				var hash = this.hash;
				$('html, body').animate({
        	scrollTop: $(hash).offset().top
      	}, 800, function(){
        	window.location.hash = hash;
      	});
				$('.mobile-nav').toggleClass('open');
				$("body").toggleClass("disableScroll");
			}
		});

		var controller = new ScrollMagic.Controller();
		// define movement of panels
		var wipeAnimation = new TimelineMax()
			// animate to second panel
			.to("#slideContainer", 0.5, {z: -150})		// move back in 3D space
			.to("#slideContainer", 1,   {x: "-25%"})	// move in to first panel
			.to("#slideContainer", 0.5, {z: 0})				// move back to origin in 3D space
			// animate to third panel
			.to("#slideContainer", 0.5, {z: -150, delay: 1})
			.to("#slideContainer", 1,   {x: "-50%"})
			.to("#slideContainer", 0.5, {z: 0})
			// animate to forth panel
			.to("#slideContainer", 0.5, {z: -150, delay: 1})
			.to("#slideContainer", 1,   {x: "-75%"})
			.to("#slideContainer", 0.5, {z: 0});

			// create scene to pin and link animation
			var scene = new ScrollMagic.Scene({
					triggerElement: "#pinContainer",
					triggerHook: "onLeave",
					duration: "500%"
				});

				scene.setPin("#pinContainer")
				.setTween(wipeAnimation)
				//.addIndicators() // add indicators (requires plugin)
				.addTo(controller)
				.on("progress", function (e) {
					console.log(e.progress);
					if(e.progress < 0.2){
						$('.navigation span').removeClass('active');
						$('.navigation span:nth-child(1)').addClass('active');
					} else if(e.progress > 0.2 && e.progress < 0.45) {
						$('.navigation span').removeClass('active');
						$('.navigation span:nth-child(2)').addClass('active');
					} else if(e.progress > 0.45 && e.progress < 0.8) {
						$('.navigation span').removeClass('active');
						$('.navigation span:nth-child(3)').addClass('active');
					} else if(e.progress > 0.8 && e.progress <= 1) {
						$('.navigation span').removeClass('active');
						$('.navigation span:nth-child(4)').addClass('active');
					}
				});


  });

})(jQuery, this);
