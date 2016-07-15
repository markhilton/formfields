<div id="field-{{ $name }}" class="form-group @if (in_array($name, $failed)) has-error @endif @if ($position != 'top') @endif" @if ($condition) style="display: none" @endif>
	@if ($label)
	<label class="control-label @if ($position == 'side') col-sm-4 @endif">
		{{ $label }} 
		@if ($tooltip) <i class="fa fa-question-circle tooltips" title="{{ $tooltip }}"></i> @endif
	</label>
    @endif

    <div @if ($position == 'side') class="col-sm-8" @endif>
		<select id="field-select-{{ $name }}" class="@if ($class) {{ $class }} @else width100p @endif" name="{{ $name }}" data-placeholder="{{ $value }}">
			@foreach ($choice as $key => $val)
				@if (is_array($val))
					<optgroup label="{{ $key }}">
					@foreach ($val as $group_key => $group_val)
						@if (is_null($value))
							<option @if ($default == $group_key) selected="selected" @endif value="{{ $group_key }}">{{ $group_val }}</option>
						@else
							<option @if ($value == $group_key) selected="selected" @endif value="{{ $group_key }}">{{ $group_val }}</option>
						@endif
					@endforeach
					</optgroup>
				@else
					@if (is_null($value))
						<option @if ($default == $key) selected="selected" @endif value="{{ $key }}">{{ $val }}</option>
					@else
						<option @if ($value == $key) selected="selected" @endif value="{{ $key }}">{{ $val }}</option>
					@endif
				@endif
			@endforeach
		</select>
	</div>
</div>





@push('script')
<script>
	jQuery('#field-select-{{ $name }}').select2({
		minimumResultsForSearch: -1
	});
</script>
@endpush
