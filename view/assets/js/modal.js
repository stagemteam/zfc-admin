// this is just an example, remember to adapt the selectors to your code!
// @link http://stackoverflow.com/a/22264259
$(document).on('click', '[data-toggle="modal"]', function (e) {
	var elm = $(this);
	var modalSize = elm.data('size') || 'md';

	if (elm.hasClass('disabled')) {
		return false;
	}

	// @link http://stackoverflow.com/a/4158203
	var modal = $('<div/>', {
			'id': elm.data('target'),
			'class': 'modal fade',
			'tabindex': -1,
			'role': 'dialog',
			'aria-hidden': 'true',
			'data-select-to' : elm.data('select-to'),
			'data-refresh' : elm.data('refresh'),
			'data-context' : elm.data('context')
		}).appendTo('body'),

		modalDialog = $('<div/>', {
			'class': 'modal-dialog modal-' + modalSize,
			'role': 'document'
		}).appendTo(modal),

		modalContent = $('<div/>', {
			'class': 'modal-content'
		}).appendTo(modalDialog),

		modalHeader = jQuery('<div/>', {
			'class': 'modal-header'
		}).html('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button><h4 class="modal-title">' + elm.data('title') + '</h4>')
			.appendTo(modalContent),

		modalBody = jQuery('<div/>', {
			'class': 'modal-body'
		}).appendTo(modalContent),

		modalFooter = jQuery('<div/>', {
			'class': 'modal-footer'
		}).appendTo(modalContent),

		removeModal = function(evt) {      // Remove modal handler
			modal.off('hidden.bs.modal');  // Turn off 'hide' event
			modal.remove();                // Remove modal from DOM
		};

	modal.on('show.bs.modal', function () {
		var elm = $(e.currentTarget);

		//console.log(e.currentTarget);
		//console.log(e);
		//console.log(elm);
		//console.log(elm.data('body'));

		if (elm.data('href') && elm.data('href').length) {
			modalBody.load(elm.data('href'));
		} else if (elm.data('body') && elm.data('body').length) {
			modalBody.html(elm.data('body'));
		}

		/*if (elm.data('select-in') && elm.data('select-in').length) {

		}*/

		modal.on('hidden.bs.modal', removeModal);
	}).modal();

	e.preventDefault();
});

// Multiple modals
// @link http://stackoverflow.com/a/24914782
$(document).on('show.bs.modal', '.modal', function () {
	var zIndex = 1040 + (10 * $('.modal:visible').length);
	$(this).css('z-index', zIndex);
	setTimeout(function() {
		$('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
	}, 0);
});
$(document).on('hidden.bs.modal', '.modal', function () {
	$('.modal:visible').length && $(document.body).addClass('modal-open');
});