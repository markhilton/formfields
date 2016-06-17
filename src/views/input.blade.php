<div id="field-{{ $name }}" class="form-group @if (in_array($name, $failed)) has-error @endif" @if ($condition) style="display: none" @endif>
    @if ($label)
    <label class="@if ($position == 'side') col-sm-4 @endif control-label">
    	{{ $label }} 
    	@if ($tooltip) <i class="fa fa-question-circle tooltips" title="{{ $tooltip }}"></i> @endif
    </label>
    @endif
    
    <div @if ($position == 'side') class="col-sm-8" @endif>
        <input type="text" name="{{ $name }}" value="{{ $value }}" placeholder="{{ $placeholder }}" class="form-control {{ $class }}" {!! $attr !!} />
    </div>
</div>
