<div class="form-group">
    <label for="{{ $name or '' }}">{{ $label or '' }}</label>
    <input class="form-control" name="{{ $name or '' }}"
    @if (isset($type))
        @if ($type == 'password')
            type="password"
        @elseif ($type == 'email')
            type="email"
        @elseif ($type == 'phone')
            type="phone"
            data-mask="(000) 000-0000"
        @elseif ($type == 'date')
            data-mask="00/00/0000"
        @elseif ($type == 'age')
            data-mask="00"
        @elseif ($type == 'numeric')
            data-mask="#"
        @endif
    @endif
        value="{{ $slot or (($type != 'password')? old($name) : '') }}" id="{{ $name or '' }}">
    @if ($errors->has($name))
        <small class="form-text text-danger">{{ $errors->first($name) }}</small>
    @endif
</div>
