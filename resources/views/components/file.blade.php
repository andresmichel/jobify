<div class="form-group">
    <label for="{{ $name or '' }}">{{ $label }}</label>
    <input type="file" class="form-control-file" name="{{ $name or '' }}" id="{{ $name or '' }}">
    @if ($errors->has($name))
        <small class="form-text text-muted">{{ $errors->first($name) }}</small>
    @endif
</div>
