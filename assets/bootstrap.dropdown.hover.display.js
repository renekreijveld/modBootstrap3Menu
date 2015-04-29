jQuery(function($) {
	$('.navbar .navbar-nav .dropdown').hover(function() {
		$(this).find('.dropdown-menu').first().stop(true, true).show();
	}, function() {
		$(this).find('.dropdown-menu').first().stop(true, true).hide();
	});
	$('.navbar .navbar-nav .dropdown > a').click(function(){
		location.href = this.href;
	});
});