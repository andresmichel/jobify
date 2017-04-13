<div class="form-group">
    <div class="form-check">
        <input id="{{ $name or '' }}" type="checkbox" class="form-check-input" name="{{ $name or '' }}" {{ $slot or '' }}>
        <label class="form-check-label" for="{{ $name or '' }}">{{ $label or '' }}</label>
    </div>
    @if ($errors->has($name))
        <small class="form-text text-danger">{{ $errors->first($name) }}</small>
    @endif
</div>
