<div id="{{ $name }}" class="form-group @if (in_array($name, $failed)) has-error @endif" @if ($condition)style="display: none"@endif>
    <label class="control-label">{{ $label }} @if ($tooltip)&nbsp; <i class="fa fa-question-circle tooltips" title="{{ $tooltip }}"></i>@endif</label>
	<textarea class="form-control {{ $class }}" name="{{ $name }}" {!! $attr !!} rows="5">{{ $value }}</textarea>
</div>




@push('script')
<script>
	var placeholder = "{{ $placeholder }}";

	jQuery("textarea[name={{ $name }}]").attr("value", placeholder);

	jQuery("textarea[name={{ $name }}]").focus(function(){
	    if(jQuery(this).val() === placeholder){
	        jQuery(this).attr("value", "");
	    }
	});

	jQuery("textarea[name={{ $name }}]").blur(function(){
	    if(jQuery(this).val() === ""){
	        jQuery(this).attr("value", placeholder);
	    } 
	});
</script>
@endpush
