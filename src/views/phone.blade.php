<div id="field-{{ $name }}" class="form-group @if (in_array($name, $failed)) has-error @endif" @if ($condition)style="display: none"@endif>
    <label class="@if ($position == 'side') col-sm-4 @endif control-label">{{ $label }} @if ($tooltip)&nbsp; <i class="fa fa-question-circle tooltips" title="{{ $tooltip }}"></i>@endif</label>
    <div class="input-group @if ($position == 'side') col-sm-8 @endif">
    	<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
        <input id="field-{{ $name }}" type="text" name="{{ $name }}" value="{{ $value }}" class="form-control {{ $class }}" {!! $attr !!} />
    </div>
</div>





@push('script')
<script>
	jQuery("#field-{{ $name }}").mask("999-99-9999");
</script>

{{ \JSqueue::link('jquery.maskedinput.min.js') }}
@endpush
