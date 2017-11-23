/**
 * Created by YC on 2017/9/25.
 */
$(function () {
	$('.aboutUs>li').mouseover(function () {
        $(this).find('div').stop(true).fadeIn('fast');
    });
    $('.aboutUs>li').mouseleave(function () {
        $(this).find('div').fadeOut('fast')
    });

    $('.close_btn').click(function () {
        $('.overlay').fadeOut('fast')
    });
    $('.close_btn_pay').click(function () {
        $('.overlay').fadeOut('fast')
    });


    $('.nav_img').click(function () {
        $('#overlay2').fadeIn('fast')
    });

    $('.bottom>div>div>img').click(function () {
        $(this).siblings('div').slideToggle('fast');
        if ($(this).css('transform') === 'matrix(6.12323e-17, 1, -1, 6.12323e-17, 0, 0)' || $(this).css('transform') === 'matrix(0, 1, -1, 0, 0, 0)') {
            $(this).animate({a: 0}, {
                step: function (now, fx) {
                    $(this).css('transform', 'rotate(' + now + 'deg)');
                }, duration: 'fast'
            }, 'linear');
        }
        else {
            $(this).animate({a: 90}, {
                step: function (now, fx) {
                    $(this).css('transform', 'rotate(' + now + 'deg)');
                }, duration: 'fast'
            }, 'linear')
        }
    });

    var current_page_h = $(window).height();

    $(window).scroll(function () {
        if($(window).scrollTop() > current_page_h){
            $('.back_top').fadeIn('fast')
        }
        else{
            $('.back_top').fadeOut('fast')
        }
    });

    $('.back_top').click(function () {
        if ($(window).scrollTop() > 15000) {
			window.scrollTo(0, 0)
		}else {
			var timer = setInterval(function () {
				if ($(window).scrollTop() !== 0)
					window.scrollBy(0, -40);
				else
					clearInterval(timer)
			}, 1)
		}
	})
});

