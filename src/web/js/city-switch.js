jQuery(function ($) {

	var currentCityCode = $.cookie('currentCityCode') || 'krd';

	$('.city-toggle').each(function () {
		var el = $(this);
		if (el.hasClass('city-toggle-' + currentCityCode)) {
			el.show();
		} else {
			el.hide();
		}
	});

	$('.city-menu .city-list a').click(function (e) {
		e.preventDefault();
		var code = $(this).attr('id').split('-')[1];
		$.cookie('currentCityCode', code, { expires: 30, path: '/' });
		location.reload();
	});

});