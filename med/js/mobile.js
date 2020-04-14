jQuery(function($)
{
$(document).ready(function() {
	var header_height = $("header.site-header").outerHeight();
	
	$('.menu-toggle').click(function(){
		$('body').toggleClass('no_sroll');
	});
		
	
	$(".main-navigation").css("top",header_height  - 30);
	$(".menu-item-has-children").children("a").append("<span class='down'></span>").css("position","relative");
	$(".down").click(function(e){
		e.preventDefault();
		$(this).parent("a").toggleClass("open");
		$(this).parent("a").siblings(".sub-menu").toggle().toggleClass("show");
		$(this).toggleClass("show");
	});
});
	
});