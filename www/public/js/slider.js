$(document).ready(function () {

    var next_button = $('.next-button');
    var start_button = $('.start-button');
    var previous_button = $('.previous-button');

    $(next_button).click(function () {
        changeSlide('next');
    })

    $(start_button).click(function () {

        var that = $(this);
        slideShow(that);
    })

    $(previous_button).click(function () {
        changeSlide('previous');
    })

    var stopSlideShow = false;

    function slideShow(caller) {

        var status = $(caller).attr('value');

        if (status.indexOf('Start') > -1) {
            stopSlideShow = false;
            $(caller).attr('value', 'Stop');
        } else {
            stopSlideShow = true;
            $(caller).attr('value', 'Start');
        }

        var interval = setInterval(function () {
            if (!stopSlideShow) {
                changeSlide('next');
            } else {
                clearInterval(interval);
            }
        }, 2000);
    }

    function changeSlide(direction) {

        var currentImage = $('.active');
        var nextImg = currentImage.next();
        var previousImg = currentImage.prev();

        if (direction == 'next') {
            console.log(nextImg.length)
            if (nextImg.length) {
                nextImg.addClass('active')
            } else {
                $('.sliders img').first().addClass('active');
            }
        } else {
            if (previousImg.length) {
                previousImg.addClass('active');
            } else {
                $('.slider img').last().addClass('active');
            }
        }
        currentImage.removeClass('active');
    }
})
