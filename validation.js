$(document).ready(function() {
	function drawerror(thefield) {
		errortext = '<span class="inline error">' + errortext + '</span>';
		thefield.addClass('errorfield');
		thefield.after($(errortext).hide().fadeIn());
	}
	function hideerror(thefield) {
		thefield.removeClass('errorfield');
		thefield.next('.error').remove();
	}
	function validate(reqfields) { 
		reqfields.each(function(){
			var thefield = $(this);
			if(thefield.val() == '') {
				errortext = thefield.attr('data-required');
				drawerror(thefield);
			} else if(thefield.attr('type') == 'email') {
				var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
				var address = thefield.val();
				if(reg.test(address) == false) {
				    errortext = 'please enter a valid email'
					drawerror(thefield);
				} else {
					hideerror(thefield);
				}
			} else if(thefield.attr('type') == 'tel') {
				var reg = /^[0-9\-\(\)\ ]+$/;
				var address = thefield.val();
				if(reg.test(address) == false) {
				    errortext = 'please enter a valid phone number'
					drawerror(thefield);
				} else {
					hideerror(thefield);
				}
			} else {
				hideerror(thefield);
			}
		});
	}

	var errortext = '';
	var reqfields = $('input[data-required]');
	reqfields.blur(function() { // validates on input un-focus
		$(this).next('.error').fadeOut().remove();
		validate($(this));
	});

	$('.js_validation').submit(function(){
		$('.error.inline').remove();
		validate(reqfields);
		if($(this).find('.error').length > 0) {
			return false;
		}

		var success_msg = '<div class="thankyou">Thank you for your enquiry - someone will be in touch soon.<a class="js_closeform closeform">Close</a></div>'

		$.ajax({
			type: "POST",
			url: this.action,
			data: $(this).serialize(),
			success: function() {
				$('.js_validation fieldset').fadeOut();
				$('.js_validation').html(success_msg).hide().fadeIn();
			}
		});
		return false;
	});
});