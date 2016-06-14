<div class="form-group @if (in_array($name, $failed)) has-error @endif @if ($position != 'top') row @endif">
	<label class="control-label @if ($position == 'side') col-sm-4 @endif">
		{{ $label }} 
		@if ($tooltip) &nbsp; <i class="fa fa-question-circle tooltips" title="{{ $tooltip }}"></i> @endif
	</label>

    <div @if ($position == 'side') class="col-sm-8" @endif>
		<select id="field-{{ $name }}" class="@if ($class) {{ $class }} @else width100p @endif" name="{{ $name }}" data-placeholder="{{ $value }}">
			@foreach ($choice as $key => $val)
			@if (is_null($value))
				<option @if ($default == $key) selected="selected" @endif value="{{ $key }}">{{ $val }}</option>
			@else
				<option @if ($value == $key) selected="selected" @endif value="{{ $key }}">{{ $val }}</option>
			@endif
			@endforeach
		</select>
	</div>
</div>





@push('script')
<script>
	jQuery('#field-{{ $name }}').select2();
</script>
@endpush
