jQuery(function($){
	$(document).ready(function() {
		// Header Navigation start
		$(".menu .menu-item-has-children").hover(function(){
			$(this).children(".sub-menu").toggle().toggleClass("show");
			$(this).toggleClass("show");
		});
	});	
});