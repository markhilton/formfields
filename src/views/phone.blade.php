<div id="field-{{ $name }}" class="form-group @if (in_array($name, $failed)) has-error @endif" @if ($condition) style="display: none" @endif>
    <label class="@if ($position == 'side') col-sm-4 @endif control-label">
    	{{ $label }} 
    	@if ($tooltip)&nbsp; <i class="fa fa-question-circle tooltips" title="{{ $tooltip }}"></i>@endif
    </label>

    <div class="input-group @if ($position == 'side') col-sm-8 @endif">
        <input id="field-input-{{ $name }}" type="tel" name="{{ $name }}" value="{{ $value }}" class="form-control {{ $class }}" {!! $attr !!} />
    </div>
</div>



<link href="/chain/css/intlTelInput.css" rel="stylesheet">


@push('script')
<script>
	// http://www.jqueryscript.net/form/jQuery-International-Telephone-Input-With-Flags-Dial-Codes.html
	jQuery('#field-input-{{ $name }}').intlTelInput({
		preferredCountries: [ "us", "ca", "gb" ],
	});
</script>

{{ \jsQueue::link('intlTelInput.js') }}
@endpush
