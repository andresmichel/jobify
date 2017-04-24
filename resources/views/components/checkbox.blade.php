<div class="form-group" id="{{ $id or '' }}">
    <div class="form-check">
        <input id="{{ $name or '' }}" type="checkbox" class="form-check-input" name="{{ $name or '' }}" {{ $slot or '' }} v-model="{{ $v_model or '' }}">
        <label class="form-check-label" for="{{ $name or '' }}">{{ $label or '' }}</label>
    </div>
    @if ($errors->has($name))
        <small class="form-text text-danger">{{ $errors->first($name) }}</small>
    @endif
</div>
