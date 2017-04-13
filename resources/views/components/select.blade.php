<div class="form-group">
    <label for="{{ $name or '' }}">{{ $label or '' }}</label>
    <select class="form-control" name="{{ $name or '' }}" id="{{ $name or '' }}">
        <option value="" hidden>Elegir un elemento de la lista</option>
        {{ $slot }}
    </select>
    @if ($errors->has($name))
        <small class="form-text text-danger">{{ $errors->first($name) }}</small>
    @endif
</div>
