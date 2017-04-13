<div class="form-group">
    <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="{{ $name or '' }}" value="{{ $slot or '' }}" checked>
            {{ $label or '' }}
        </label>
    </div>
    @if ($errors->has($name))
        <small class="form-text text-danger">{{ $errors->first($name) }}</small>
    @endif
</div>
