(function($) {
	
	"use strict";







	//Tabs Box
	if($('.tabs-box').length){
		$('.tabs-box .tab-buttons .tab-btn').on('click', function(e) {
			e.preventDefault();
			var target = $($(this).attr('data-tab'));
			
			if ($(target).is(':visible')){
				return false;
			}else{
				target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');
				$(this).addClass('active-btn');
				target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);
				target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab animated fadeIn');
				$(target).fadeIn(300);
				$(target).addClass('active-tab animated fadeIn');
			}
		});
	}

	//Product Tabs
	if($('.project-tab').length){
		$('.project-tab .tab-btns .tab-btn').on('click', function(e) {
			e.preventDefault();
			var target = $($(this).attr('data-tab'));
			
			if ($(target).hasClass('actve-tab')){
				return false;
			}else{
				$('.project-tab .tab-btns .tab-btn').removeClass('active-btn');
				$(this).addClass('active-btn');
				$('.project-tab .tabs-content .tab').removeClass('active-tab');
				$(target).addClass('active-tab');
			}
		});
	}



	// Elements Animation
	if($('.wow').length){
		var wow = new WOW(
		  {
			boxClass:     'wow',      // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset:       0,          // distance to the element when triggering the animation (default is 0)
			mobile:       false,       // trigger animations on mobile devices (default is true)
			live:         true       // act on asynchronously loaded content (default is true)
		  }
		);
		wow.init();
	}

	//background parallax		
	function bg_parallax(){
		if($('.page-wrapper').length){
			jQuery(function(){
				jQuery.stellar({
				}).delay(2000);;
			});		
		}	
	}

	//MixItup Gallery
	if($('.filter-list').length){
	 	 $('.filter-list').mixItUp({
		 	 callbacks: {
		        onMixEnd: function(state, futureState) {
					bg_parallax();
		        }
		    }
	 	 });
	 }



/* ==========================================================================
   When document is loading, do
   ========================================================================== */
	
	$(window).on('load', function() {
		handlePreloader();
		if($('body').find(".mixitup-gallery").length <= 0){
			bg_parallax();
		}
	});	

})(window.jQuery);