jQuery(function($)
{
$(document).ready(function() {
	var header_height = $("header.site-header").outerHeight();
	
	$('.menu-toggle').click(function(){
		$('body').toggleClass('no_sroll');
	});

		
	if($(window).width() < 768){
		$(".footer_col h4").click(function(){
			$(this).parents('.footer_col').find('ul , address').slideToggle('100');
		});
	}

});	
});