$('#myModal').on('shown.bs.modal', function() {
    $("#myInput").focus();
});

function swiperMobile() {
	if ($(window).width() < 600) {

		$('[data-container]').addClass('swiper-container');
		$('[data-wrapper]').addClass('swiper-wrapper');
		$('[data-slide]').addClass('swiper-slide');

		var mySwiper = new Swiper ('.swiper-container', {
			    // Optional parameters
			direction: 'horizontal',
			loop: true,
		  	}); 

	} else {
		$('.swiper-container').removeClass('swiper-container');
		$('.swiper-wrapper').removeClass('swiper-wrapper');
		$('.swiper-slide').removeClass('swiper-slide');
	}
}

swiperMobile();


$(window).resize(function() {
	swiperMobile();
});
