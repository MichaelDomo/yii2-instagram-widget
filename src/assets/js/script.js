$(document).ready(function() {
    var settings = {
        autoplay: false,
        mobileFirst: true,
        pauseOnHover: false,
        speed: 500,
        slidesToShow: 5,
        slidesToScroll: 1,
        infinity: false,
        responsive: [{
            breakpoint: 300,
            settings: {
                slidesToShow: 1
            }
        },{
            breakpoint: 600,
            settings: {
                slidesToShow: 2
            }
        },{
            breakpoint: 800,
            settings: {
                slidesToShow: 3
            }
        },{
            breakpoint: 1000,
            settings: {
                slidesToShow: 4
            }
        },{
            breakpoint: 1100,
            settings: {
                slidesToShow: 5
            }
        }]
    };

    $('.instashow-slider').slick(settings);

    $('.instashow-gallery-media-link').click(function (e) {
        event.preventDefault(e);
        var $this = $(this);
        var mediaId = $this.data('media-id'),
            rootElement = $this.closest('.instashow');
        var currentMedia = rootElement.find('.instashow-popup-media[data-media-id="' + mediaId + '"]');

        rootElement.find('.instashow-popup-control-arrow').data('media-id', mediaId);
        rootElement.find('.instashow-popup-media').hide();
        currentMedia.show();
        rootElement.find('.instashow-popup').fadeIn(300);
    });

    $('.instashow-popup-control-close').click(function () {
        $(this).closest('.instashow-popup').fadeOut(300);
    });

    $('.instashow-popup-control-arrow-next').on('click', function () {
        var $this = $(this);
        var rootElement = $this.closest('.instashow');
        var mediaId = $this.data('media-id');
        var currentMedia = rootElement.find('.instashow-popup-media[data-media-id="' + mediaId + '"]');
        var nextMedia = currentMedia.next('.instashow-popup-media');
        if (!nextMedia.length) {
            nextMedia = rootElement.find('.instashow-popup-media').first();
        }
        rootElement.find('.instashow-popup-control-arrow').data('media-id', nextMedia.data('media-id'));
        currentMedia.fadeOut(function () {
            nextMedia.fadeIn(300);
        });
    });

    $('.instashow-popup-control-arrow-previous').click(function () {
        var $this = $(this);
        var rootElement = $this.closest('.instashow');
        var mediaId = $this.data('media-id');
        var currentMedia = rootElement.find('.instashow-popup-media[data-media-id="' + mediaId + '"]');
        var prevMedia = currentMedia.prev('.instashow-popup-media');
        if (!prevMedia.length) {
            prevMedia = rootElement.find('.instashow-popup-media').last();
        }
        rootElement.find('.instashow-popup-control-arrow').data('media-id', prevMedia.data('media-id'));
        currentMedia.fadeOut(function () {
            prevMedia.fadeIn(300);
        });
    });

    $('video').click(function() {
        if (this.paused) {
            $(this).closest('.instashow-popup-media').addClass('instashow-playing');
            this.play();
        } else {
            $(this).closest('.instashow-popup-media').removeClass('instashow-playing');
            this.pause();
        }
    });

    $('.instashow-popup-control-close, .instashow-popup-control-arrow-next, .instashow-popup-control-arrow-previous').click(function () {
        var videos = $('.instashow-popup-media-video video');
        if (videos.length) {
            videos.each(function() {
                this.currentTime = 0;
                this.pause();
                $(this).closest('.instashow-popup-media').removeClass('instashow-playing');
            });
        }
    })
});
