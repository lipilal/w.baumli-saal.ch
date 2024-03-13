jQuery(document).ready(function () {
	jQuery('.controls#phnewsbulletin-img-container li img').click(function () {
		jQuery('.controls#phnewsbulletin-img-container li').each(function () {
			jQuery(this).find('img').removeClass('phnewsbulletin-radio-img-selected');
		});
		jQuery(this).addClass('phnewsbulletin-radio-img-selected');
	});
});