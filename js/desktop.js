jQuery(function($){
	$(document).ready(function() {
		// Header Navigation start
		$(".menu .menu-item-has-children").hover(function(){
			$(this).children(".sub-menu").toggle().toggleClass("show");
			$(this).toggleClass("show");
		});


		$(window).scroll(function(){
			if($(window).scrollTop() > $('.site-header').outerHeight() + 20){
				$('.site-header').addClass('sticky');
			}else{
				$('.site-header').removeClass('sticky');
			}
    	});

	});
});