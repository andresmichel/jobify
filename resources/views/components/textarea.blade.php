<div class="form-group">
    <label for="{{ $name or '' }}">{{ $label or '' }}</label>
    <textarea {{ $hidden or '' }} class="form-control" name="{{ $name or '' }}" rows="4" cols="80" id="{{ $name or '' }}">{{ $slot or '' }}</textarea>
    @if ($errors->has($name))
        <small class="form-text text-danger">{{ $errors->first($name) }}</small>
    @endif
</div>
