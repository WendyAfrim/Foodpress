$(document).ready(function () {
    var menu = $('#menu-bar');
    var navbar = $('.navbar');

    $(menu).click(function () {
        console.log('hello');
        $(menu).toggleClass('fa-times');
        $(navbar).toggleClass('active');
    })

    $(window).on('scroll', function (e) {
        menu.removeClass('fa-times');
        navbar.removeClass('active');
    })

    $('#search-icon').click(function () {
        $('#search-form').toggleClass('active');
    })

    $('#close').click(function () {
        $('#search-form').removeClass('active');
    })

})