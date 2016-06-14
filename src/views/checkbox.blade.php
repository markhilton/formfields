<div class="form-group @if (in_array($name, $failed)) has-error @endif" @if ($condition) style="display: none" @endif>
    <label class="control-label @if ($name == 'side') col-sm-4 @endif">
    	{{ $label }} 
    	@if ($tooltip)&nbsp; <i class="fa fa-question-circle tooltips" title="{{ $tooltip }}"></i>@endif
    </label>
    
    <div class="input-group  @if ($name == 'side') col-sm-8 @endif">

		@foreach ($choice as $key => $val)
		<div class="ckbox ckbox-default @if (is_numeric($inline)) col-md-{{ $inline }} @elseif ($inline) {{ $inline }} @endif">
		    <input type="checkbox" name="{{ $name }}" value="{{ $key }}" id="form-{{ $name }}" {{ $val }} />
		    <label for="{{ $key }}">{{ $val }}</label>
		</div>
		@endforeach

	</div>
</div>
