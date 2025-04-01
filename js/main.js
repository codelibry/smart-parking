jQuery(function($) {

    /*
     * Video Popup
     */
    $(document).ready(function () {
        $('.play-button').fancybox();
    });


    /*
     * Header Mega-Menu
     */
    $('#menu-primary-menu > li').on('click', function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
        }
    });


    /*
     * Read More/Less Toggle
     */
    $('.moreless-button').click(function () {
        $('.moretext').slideToggle();

        if ($('.moreless-button').text().trim() == "Read more") {
            $(this).html("Read less")
        } else {
            $(this).html("Read more")
        }
    });

});
