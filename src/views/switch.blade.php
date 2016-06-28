<div id="field-{{ $name }}" class="switch-field form-group @if (in_array($name, $failed)) has-error @endif" @if ($condition) style="display: none" @endif>
    
@if ($label)
	<div class="switch-title">{{ $label }}</div>    	 
	@if ($tooltip) <i class="fa fa-question-circle tooltips" title="{{ $tooltip }}"></i>@endif
@endif

@foreach ($choice as $key => $val)
    <input type="radio" name="{{ $name }}" value="{{ $key }}" id="switch-{{ $name }}-{{ $key }}" @if ((!is_null($value) and $key == $value) or $key == $placeholder) checked="true" @endif />
    <label for="switch-{{ $name }}-{{ $key }}">{{ $val }}</label>
@endforeach
</div>
