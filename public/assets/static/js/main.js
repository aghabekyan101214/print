
$(document).ready(function() {
	$('#content-slider').lightSlider({
		item: 2,
		loop: false,
		slideMove: 2,
		easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
		speed: 600,
		lspager: 2,
		responsive: [{
			breakpoint: 1024,
			settings: {
				item: 2,
				slideMove: 1,
				slideMargin: 6,
			}
		}, {
			breakpoint: 480,
			settings: {
				item: 1,
				slideMove: 1
			}
		}]
	});
	$('#content-slider1').lightSlider({
		item: 6,
		loop: false,
		slideMove: 2,
		easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
		speed: 600,
		lspager: 2,
		responsive: [{
			breakpoint: 1024,
			settings: {
				item: 2,
				slideMove: 1,
				slideMargin: 6,
			}
		}, {
			breakpoint: 480,
			settings: {
				item: 1,
				slideMove: 1
			}
		}]
	});
});
