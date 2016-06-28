<div id="field-{{ $name }}" class="form-group @if (in_array($name, $failed)) has-error @endif" @if ($condition) style="display: none" @endif>
    <label class="@if ($position == 'side') col-sm-4 @endif control-label">{{ $label }} @if ($tooltip)&nbsp; <i class="fa fa-question-circle tooltips" title="{{ $tooltip }}"></i>@endif</label>
    <div class="input-group">
		<div class="bootstrap-timepicker">
		    <input type="text" name="{{ $name }}" value="{{ $value }}" class="form-control" {{ $class }} {!! $attr !!} placeholder="mm/dd/yyyy" id="timepicker-{{ $name }}">
		</div>
	    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
    </div>
</div>





@push('script')
<script>
    jQuery('#timepicker-{{ $name }}').timepicker({
        defaultTIme: false
    });
</script>

{{ \JSqueue::link('bootstrap-timepicker.min.js') }}
@endpush
