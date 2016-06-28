<div id="field-{{ $name }}" class="form-group @if (in_array($name, $failed)) has-error @endif" @if ($condition) style="display: none" @endif>
	@if ($label)
    <label class="control-label @if ($name == 'side') col-sm-4 @endif">
    	{{ $label }} 
    	@if ($tooltip) <i class="fa fa-question-circle tooltips" title="{{ $tooltip }}"></i> @endif
    </label>
    @endif
    
    <div class="input-group  @if ($name == 'side') col-sm-8 @endif">

		@foreach ($choice as $key => $val)
		<div class="ckbox ckbox-default @if (is_numeric($inline)) col-md-{{ $inline }} @elseif ($inline) {{ $inline }} @endif">
		    <input type="checkbox" name="{{ $name }}{{ $array }}" value="{{ $key }}" id="checkbox-{{ $name }}-{{ $key }}" 
		    @if (is_array($value) and in_array($key, $value)) checked="true" @endif />
		    <label for="checkbox-{{ $name }}-{{ $key }}">{{ $val }}</label> 
		</div>
		@endforeach
		
	</div>
</div>
