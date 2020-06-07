$(window).on('ajaxInvalidField', function(event, fieldElement, fieldName, errorMsg, isFirst) {
	console.log('test');
    $(fieldElement).closest('.form-group').addClass('has-error');
});

$(document).on('ajaxPromise', '[data-request]', function() {
	console.log('testing');
    $(this).closest('form').find('.form-group.has-error').removeClass('has-error');
});