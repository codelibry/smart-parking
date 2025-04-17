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
    $(document).on('click', function (e) {
        // Check if the click happened outside the menu item
        if (!$(e.target).closest('#menu-primary-menu > li').length) {
            $('#menu-primary-menu > li').removeClass('active');
        }
    });

    // Prevent the menu item click from bubbling up to the document
    $('#menu-primary-menu > li').on('click', function (e) {
        e.stopPropagation();

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

        if ($('.moreless-button').text().trim() == codelibry.read_more) {
            $(this).html(codelibry.read_less)
        } else {
            $(this).html(codelibry.read_more)
        }
    });


    /*
     * Appeal Reasons Dropdown
     */
    $('#appeal-reasons-dropdown').change(function () {
        var selectedReasonId = $('#appeal-reasons-dropdown').val();
        var currentId = selectedReasonId.toString().substring(selectedReasonId.lastIndexOf('-') + 1);

        $('.appeal-reason-details').hide();
        $('#appeal-body-' + currentId).fadeIn();
    });

});
