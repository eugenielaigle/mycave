$('#myModal').on('shown.bs.modal', function() {
    $("#myInput").focus();
});

function swiperMobile() {
	if ($(window).width() < 991) {

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


$('.suppr').click(function() {
	var id = $(this).data('id');
	var idProduct = 'id_produit=' + id;
	var urlId = '"fiche_produit_delete_post.php?id_produit=' + id + '"' ;
	console.log($(this).parents('.fiche').prevAll('#showModal'));
	$(this).parents('.fiche').nextAll('#showModal').load('fiche_produit_delete.php',idProduct, function(){
		$('#confirmDelete').on('click',function() {
			$(this).attr('href', urlId);
		});
		$('#showModal').fadeIn(1000);
	});
});

$("#datepicker").datepicker({
    dateFormat:'yyyy'
});
