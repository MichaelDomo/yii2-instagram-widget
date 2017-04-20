$(document).ready(function() {
    var settings = {
        autoplay: false,
        mobileFirst: true,
        pauseOnHover: false,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 2,
        infinity: false,
        responsive: [{
            breakpoint: 215,
            settings: {
                slidesToShow: 1
            }
        },{
            breakpoint: 430,
            settings: {
                slidesToShow: 2
            }
        },{
            breakpoint: 860,
            settings: {
                slidesToShow: 4
            }
        }]
    };
    $('.slider').slick(settings);
    $('.instashow-gallery-media-link').click(function (e) {
        event.preventDefault(e);
        var mediaId = $(this).data('media-id');
        $('.instashow-popup[data-media-id="' + mediaId + '"]').fadeIn(400);
    });
    $('.instashow-popup-control-close').click(function () {
        $(this).closest('.instashow-popup').fadeOut(400);
    })
    $('.instashow-popup-control-arrow').click(function () {
        var key = $(this).data('key');
        var rootElement = $(this).closest('.instashow-wrap');
        if (key === -1) {
            var dataTarget = rootElement.find('.instashow-popup').last();
        } else {
            if (rootElement.find('div').is('.instashow-popup[data-key="' + key + '"]')) {
                var dataTarget = rootElement.find('.instashow-popup[data-key="' + key + '"]');
            } else {
                var dataTarget = rootElement.find('.instashow-popup').first();
            }
        }
        $(this).closest('.instashow-popup').fadeOut(100, function () {
            dataTarget.fadeIn(400);
        })
    })
});
