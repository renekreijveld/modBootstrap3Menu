jQuery(function() {
	jQuery('.bs3menu .dropdown').hover(function() {
		jQuery(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
	}, function() {
		jQuery(this).find('.dropdown-menu').first().stop(true, true).slideUp(105)
	});
	jQuery('.bs3menu .dropdown > a').click(function(){
		location.href = this.href;
	});
});