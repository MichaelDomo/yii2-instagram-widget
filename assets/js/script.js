$(document).ready(function () {
    // rollover effect
    $('li').hover(
        function () {
            var $image = $(this).find('.media');
            var height = $image.height();
            $image.stop().animate({marginTop: -(height - 82)}, 1000);
        }, function () {
            var $image = $(this).find('.media');
            var height = $image.height();
            $image.stop().animate({marginTop: '0px'}, 1000);
        }
    );
});
