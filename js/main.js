jQuery(function($) {

    $(document).ready(function () {
        $('.play-button').fancybox();
    });

    $('#menu-primary-menu > li').on('click', function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
        }
    });

    $('.region .select-items div').on('click keyup', function () {
        var redirectValue = $('#culture-dropdown option:contains(' + $(this).text() + ')').val();
        window.location = '/' + redirectValue;
    });

    $('#mobile-culture-dropdown').change(function () {
        var redirectValue = $('#mobile-culture-dropdown option:contains(' + $('#mobile-culture-dropdown option:selected').text() + ')').val();
        window.location = '/' + redirectValue;
    });

});
