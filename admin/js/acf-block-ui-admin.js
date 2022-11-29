(function ($) {
	'use strict';

	$(function () {
		$('.acf_ui_block_name input').on('change keyup', function () {
			var value = $(this).val().toLowerCase().replace(/ /g, '_').replace(/[^a-z0-9_]/g, '');
			$('.acf_ui_block_slug input').val(value);
		})
	});

})(jQuery);
