<div class="form-group">
    <label for="{{ $name or '' }}">{{ $label or '' }}</label>
    <input class="form-control" type="{{ $type or 'text' }}" name="{{ $name or '' }}"
        value="{{ $slot or (($type != 'password')? old($name) : '') }}" id="{{ $name or '' }}">
    @if ($errors->has($name))
        <small class="form-text text-muted">{{ $errors->first($name) }}</small>
    @endif
</div>
