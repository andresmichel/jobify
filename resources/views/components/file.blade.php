<div class="form-group">
    @if (isset($label))
        <label for="{{ $name or '' }}">{{ $label }}</label>
    @endif
    <input type="file" class="form-control-file" name="{{ $name or '' }}" id="{{ $name or '' }}">

    @if ($errors->has($name))
        <small class="form-text text-danger">{{ $errors->first($name) }}</small>
    @endif
</div>

@if (isset($slot))
    <div class="form-group">
        <small class="form-text text-muted">
            <a href="{{ $url or '#' }}" target="_blank">
                {{ $slot }}
            </a>
        </small>
    </div>
@endif
