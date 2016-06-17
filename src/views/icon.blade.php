<div id="field-{{ $name }}" class="form-group @if (in_array($name, $failed)) has-error @endif" @if ($condition) style="display: none" @endif>
    @if ($label)
    <label class="@if ($position == 'side') col-sm-4 @endif control-label">
    	{{ $label }} 
    	@if ($tooltip) <i class="fa fa-question-circle tooltips" title="{{ $tooltip }}"></i> @endif
    </label>
    @endif
    
    <div class="input-group @if ($position == 'side') col-sm-8 @endif ">
    @if ($left)
    	<span class="input-group-addon">{{ $left }}</span>
    @endif

        <input type="text" name="{{ $name }}" value="{{ $value }}" placeholder="{{ $placeholder }}" class="form-control {{ $class }}" {!! $attr !!} />

    @if ($right)
    	<span class="input-group-addon">{{ $right }}</span>
    @endif
    </div>
</div>

@if ($mask)
@push('script')
<script>
    jQuery('input[name={{ $name }}]').mask('{!! $mask !!}');
</script>

{{ \jsQueue::link('jquery.maskedinput.min.js') }}
@endpush
@endif
