/**
 * Created by QuangThang on 12/22/2016.
 */
$(document).ready(function () {
    $("#slide").bxSlider({
        auto: true,
        pager: false
    });
    $('nav ul li a').each(function () {
        if ($(this).attr('href') == window.location.href) {
            $(this).closest('li').addClass('active');
        }
    });
});