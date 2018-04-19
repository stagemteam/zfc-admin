jQuery(document).ready(function($) {
	var stagemDatepickerOptions = {
		//dateFormat: 'dd/mm/yy',
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		//yearRange: '1920:'
		yearRange: '-100:+1' // last 100 years plus one
	};

	$('.datepicker').datepicker(stagemDatepickerOptions);

	// dynamic elements
	$('body').on('focus', '.datepicker', function() {
		$(this).datepicker(stagemDatepickerOptions);
	});
});
