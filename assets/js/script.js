$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    if (scroll >= 150) {
        $("body").addClass("fixHeader");
    }else{
		 $("body").removeClass("fixHeader");
	}
});
/*-------------*/
$(function()
{
        $('#myCarousel') .css({'height': (($(window).height()) - 117)+'px'});
    
        $(window).bind('resize', function(){
            $('#myCarousel') .css({'height': (($(window).height()) - 117)+'px'});
        });
});
/*-----=MENU SCRIPT---------*/
$(document).ready(function ($) {
    $.fn.menumaker = function (options) {
        var flexmenu = $(this), settings = $.extend({
                format: 'dropdown',
                sticky: false
            }, options);
        return this.each(function () {
            $(this).find('.button').on('click', function () {
                $(this).toggleClass('menu-opened');
                var mainmenu = $(this).next('ul');
                if (mainmenu.hasClass('open')) {
                    mainmenu.slideToggle().removeClass('open');
                } else {
                    mainmenu.slideToggle().addClass('open');
                    if (settings.format === 'dropdown') {
                        mainmenu.find('ul').show();
                    }
                }
            });
            flexmenu.find('li ul').parent().addClass('has-sub');
            subToggle = function () {
                flexmenu.find('.has-sub').prepend('<span class="submenu-button"></span>');
                flexmenu.find('.submenu-button').on('click', function () {
                    $(this).toggleClass('submenu-opened');
                    if ($(this).siblings('ul').hasClass('open')) {
                        $(this).siblings('ul').removeClass('open').slideToggle();
                    } else {
                        $(this).siblings('ul').addClass('open').slideToggle();
                    }
                });
            };
            if (settings.format === 'multitoggle')
                subToggle();
            else
                flexmenu.addClass('dropdown');
            if (settings.sticky === true)
                flexmenu.css('position', 'fixed');
            resizeFix = function () {
                var mediasize = 768;
                if ($(window).width() > mediasize) {
                    flexmenu.find('ul').show();
                }
                if ($(window).width() <= mediasize) {
                    flexmenu.find('ul').hide().removeClass('open');
                }
            };
            resizeFix();
            return $(window).on('resize', resizeFix);
        });
    };

   $('#flexmenu').menumaker({ format: 'multitoggle' });
  
}(jQuery));

/*-----End MENU SCRIPT---------*/
  $(document).ready(function() {
        $('.popup-gallery').magnificPopup({
          delegate: 'a',
          type: 'image',
          tLoading: 'Loading image #%curr%...',
          mainClass: 'mfp-img-mobile',
          gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
          },
          image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
              return item.el.attr('title') + '<small>By Snack Society</small>';
            }
          }
        });
      });
/*--------*/
$(document).ready(function() {

// Gets the video src from the data-src on each button

var $videoSrc;  
$('.video').click(function() {
    $videoSrc = $(this).data( "src" );
});
console.log($videoSrc);

  
  
// when the modal is opened autoplay it  
$('.myModal_vid').on('shown.bs.modal', function (e) {
    
// set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
$(".video_src").attr('src',$videoSrc + "?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;autoplay=0" ); 
	
})
  
// stop playing the youtube video when I close the modal
$('.myModal_vid').on('hide.bs.modal', function (e) {
    // a poor man's stop video
    $(".video_src").attr('src',$videoSrc); 
}) 
    
// document ready  
});

