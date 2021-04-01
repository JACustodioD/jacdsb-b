window.addEventListener('scroll', function(){

    if($(window).scrollTop() > 20) {
        $(".sticky-top").addClass('nav-fixed');
    } else {
        $(".sticky-top").removeClass("nav-fixed");
    }
});