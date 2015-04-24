jQuery(function($) {
	$('.navbar .navbar-nav .dropdown').hover(function() {
		$(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
	}, function() {
		$(this).find('.dropdown-menu').first().stop(true, true).slideUp(105)
	});
	$('.navbar .navbar-nav .dropdown > a').click(function(){
		location.href = this.href;
	});
});