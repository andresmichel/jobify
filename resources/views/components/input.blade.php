<div class="form-group">
    <label>{{ $label or '' }}</label>
    <input class="form-control" type="{{ $type or 'text' }}" name="{{ $name or '' }}" value="" {{ $required ? 'required' : '' }}>
</div>
