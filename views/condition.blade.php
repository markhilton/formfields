jQuery('[name={{ $condition }}]').on('blur change', function() {
    var value = jQuery('[name={{ $condition }}]').val();

    if (value == '{{ $value }}') {
        jQuery('#{{ $name }}').fadeIn();
    } else {
        jQuery('#{{ $name }}').hide();
    }
});
