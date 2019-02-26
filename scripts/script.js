/* Javascript code */

function showSidebar() {
    $('.ui.sidebar').sidebar({
        context: $('.ui.pushable.segment')
    }).sidebar('attach events', '#mobile-item');

}
  
/* jQuery code */

$(document).ready(function(){
    $(".hamburger").click(function(){
      $(this).toggleClass("is-active");
    });

    /* Media query responsive navigation bar*/

    $(window).on('resize', function() {
        if ($(window).width() < 600) {
            $('.ui.sidebar').removeClass("visible");
        } 
    });

    $(window).on('resize', function() {
        if ($(window).width() > 600) {
            $('.ui.sidebar').addClass("visible");
            $('.ui.sidebar').addClass("left");
        }
    });

    if ($(window).width() > 768) {
        $('.ui.sidebar').addClass("visible");
        $('.ui.sidebar').addClass("left");
    }
    if ($(window).width() > 768) {
        $('.ui.sidebar').addClass("visible");
        $('.ui.sidebar').addClass("left");
    }

   


  });
  