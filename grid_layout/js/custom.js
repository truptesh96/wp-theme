$(".tap .tap_title").click(function(){
    $(this).parent(".tap").toggleClass("open");
    $(this).siblings(".tap_content").slideToggle("1000");
});