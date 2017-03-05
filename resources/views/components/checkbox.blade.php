<div class="form-group">
    <div class="form-check">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="{{ $name or '' }}">
            {{ $label or '' }}
        </label>
    </div>
    @if ($errors->has($name))
        <small class="form-text text-muted">{{ $errors->first($name) }}</small>
    @endif
</div>
