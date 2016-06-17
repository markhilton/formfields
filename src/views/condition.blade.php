jQuery('[name={{ $condition }}]').on('blur change', function() {
	var field_type = jQuery('[name={{ $condition }}]').attr('type');

    if (jQuery('[name={{ $condition }}]').attr('type') == 'radio') {
    	var value = jQuery('input[name={{ $condition }}]:checked').val();	
    } else {
    	var value = jQuery('[name={{ $condition }}]').val();
    }

    if (value == '{{ $value }}') {
        jQuery('#field-{{ $name }}').fadeIn();
    } else {
        jQuery('#field-{{ $name }}').hide();
    }
});



var field_type = jQuery('[name={{ $condition }}]').attr('type');

if (jQuery('[name={{ $condition }}]').attr('type') == 'radio') {
    var value = jQuery('input[name={{ $condition }}]:checked').val();   
} else {
    var value = jQuery('[name={{ $condition }}]').val();
}

if (value == '{{ $value }}') {
    jQuery('#field-{{ $name }}').fadeIn();
} else {
    jQuery('#field-{{ $name }}').hide();
}
