jQuery(function() {
	jQuery('.bs3menu .dropdown').hover(function() {
		jQuery(this).find('.dropdown-menu').first().stop(true, true).show();
	}, function() {
		jQuery(this).find('.dropdown-menu').first().stop(true, true).hide();
	});
	jQuery('.bs3menu .dropdown > a').click(function(){
		location.href = this.href;
	});
});