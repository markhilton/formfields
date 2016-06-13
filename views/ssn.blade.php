		    <div class="form-group mb20">
		        <label class="col-sm-4 control-label">%s</label>
		        <div class="col-sm-8">
		        	<span class="input-group-addon"><i class="glyphicon glyphicon-%s"></i></span>
		            <input id="%s" type="text" name="%s" value="%s" class="form-control%s" />
		        </div>
		    </div>', $label, $id, $arg['name'], $arg['value'], $arg['class']




<div class="form-group @if (in_array($name, $failed)) has-error @endif" @if ($condition)style="display: none"@endif>
    <label class="@if ($position == 'side') col-sm-4 @endif control-label">{{ $label }} @if ($tooltip)&nbsp; <i class="fa fa-question-circle tooltips" title="{{ $tooltip }}"></i>@endif</label>
    <div @if ($position == 'side') class="col-sm-8" @endif>
        <input type="text" name="{{ $name }}" value="{{ $value }}" class="form-control {{ $class }}" {!! $attr !!} />
    </div>
</div>
