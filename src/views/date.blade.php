<div id="field-{{ $name }}" class="form-group @if (in_array($name, $failed)) has-error @endif" @if ($condition) style="display: none" @endif>
    <label class="@if ($position == 'side') col-sm-4 @endif control-label">{{ $label }} @if ($tooltip)&nbsp; <i class="fa fa-question-circle tooltips" title="{{ $tooltip }}"></i>@endif</label>
	<div class="input-group">
	    <input type="text" name="{{ $name }}" value="{{ $value }}" class="form-control" {{ $class }} {!! $attr !!} placeholder="mm/dd/yyyy" id="datepicker-{{ $name }}">
	    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
	</div>
</div>





@push('script')
<script>
    jQuery('#datepicker-{{ $name }}').datepicker({
        numberOfMonths: 3,
        showButtonPanel: true
    });
</script>
@endpush
