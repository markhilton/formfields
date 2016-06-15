jQuery('[name={{ $condition }}]').on('blur change', function() {
    var value = jQuery('[name={{ $condition }}]').val();

    if (value == '{{ $value }}') {
        jQuery('#field-{{ $name }}').fadeIn();
    } else {
        jQuery('#field-{{ $name }}').hide();
    }
});
