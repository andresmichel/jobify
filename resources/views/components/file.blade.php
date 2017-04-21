<div class="form-group">
    @if (isset($label))
        <label for="{{ $name or '' }}">
            {{ $label }}

            @if (isset($slot))
                <small class="form-text text-muted ml-2" style="display:inline-block;margin-top:0;">
                    <a href="{{ $url or '#' }}" target="_blank">
                        {{ $slot }}
                    </a>
                </small>
            @endif
        </label>
    @endif

    <input type="file" class="form-control-file" name="{{ $name or '' }}" id="{{ $name or '' }}">

    @if ($errors->has($name))
        <small class="form-text text-danger">{{ $errors->first($name) }}</small>
    @endif
</div>
