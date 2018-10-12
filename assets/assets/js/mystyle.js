$(document).ready(function () {

    var scrollTop = 0;
    $(window).scroll(function () {
        scrollTop = $(window).scrollTop();
        $('.counter').html(scrollTop);

        if (scrollTop >= 100) {
            $('.scrolling-navbar').addClass('top-nav-collapse');
        } else if (scrollTop < 100) {
            $('.scrolling-navbar').removeClass('top-nav-collapse');
        }

    });

});