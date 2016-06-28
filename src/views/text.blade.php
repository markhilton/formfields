<div id="field-{{ $name }}" class="form-group @if (in_array($name, $failed)) has-error @endif" @if ($condition) style="display: none" @endif>
    <label class="control-label">
    	{{ $label }} 
    	@if ($tooltip) <i class="fa fa-question-circle tooltips" title="{{ $tooltip }}"></i> @endif
    </label>

	<textarea class="form-control {{ $class }}" name="{{ $name }}" {!! $attr !!} rows="{{ $rows }}">{{ $value }}</textarea>

	@if ($maxlength)
	<div class="bottom-note" id="field-counter-{{ $name }}"></div>
	@endif
</div>




@push('script')
<script>
	var value = "{{ $value }}";

	if (value) {
		var placeholder = "{{ $value }}";	
	} else {
		var placeholder = "{{ $placeholder }}";			
	}


	jQuery("textarea[name={{ $name }}]").attr("value", placeholder);

	jQuery("textarea[name={{ $name }}]").focus(function(){
	    if (jQuery(this).val() === placeholder){
	        jQuery(this).attr("value", "");
	    }
	});

	jQuery("textarea[name={{ $name }}]").blur(function(){
	    if (jQuery(this).val() === ""){
	        jQuery(this).attr("value", placeholder);
	    } 
	});


@if ($maxlength)
    var text_max       = {{ $maxlength }};
    var text_length    = $('textarea[name={{ $name }}]').val().length;
    var text_remaining = text_max - text_length;

    jQuery('#field-counter-{{ $name }}').html(text_remaining + ' characters remaining');

    jQuery('textarea[name={{ $name }}]').keyup(function() {
        var text_length = $('textarea[name={{ $name }}]').val().length;
        var text_remaining = text_max - text_length;

        jQuery('#field-counter-{{ $name }}').html(text_remaining + ' characters remaining');
    });
@endif
</script>
@endpush
