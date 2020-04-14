jQuery(function($){
	$(window).load(function(){
    	$('.loader').remove();
        $("body").addClass("loaded_cust");
    });
 
$(document).ready(function() {
	var win_height = $(window).outerHeight();
    setTimeout(function(){
    var body_height = $('body').outerHeight();
    if( win_height > body_height){$(".site_footer").addClass("sticky");}
    },800);

    $(".wpcf7-form br").remove();

    /*------- Vertical Tabs --------*/
    $('.titles .title').eq(0).addClass('open');
    $('.contents .content').eq(0).addClass('open');

    $(".tabs .title").mouseenter(function(){ 
        $(this).addClass("open").siblings('.title').removeClass("open");
        $('.contents .content').eq($(this).index()).addClass("open").siblings('.content').removeClass("open");
    });
   
    
    // Toggle navigation on Mobile start
    $(".menu-toggle").click(function(){
    	$(".main-navigation").toggle();
    	$(this).toggleClass("active");
    });
    // Toggle navigation on Mobile end
    // Accordian js start
    $(".accordian li").click(function(){
        $(this).toggleClass("active");
    });
	// Accordian js End
});
});