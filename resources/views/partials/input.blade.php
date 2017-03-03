@if (isset($type) && $type == 'checkbox')
    <div class="form-check">
        <label class="form-check-label">
            <input name="{{ $name }}" type="checkbox" class="form-check-input" {{ $value or '' }}>
            {{ $label or title_case($name) }}
        </label>

        @if ($errors->has($name))
            <small class="form-text text-muted">{{ $errors->first($name) }}</small>
        @endif
    </div>

@elseif (isset($type) && $type == 'textarea')
    <div class="form-group">
        <label>{{ $label or title_case($name) }}</label>
        <textarea name="{{ $name }}" rows="6" cols="80" class="form-control">{{ $value or old($name) }}</textarea>

        @if ($errors->has($name))
            <small class="form-text text-muted">{{ $errors->first($name) }}</small>
        @endif
    </div>

@elseif (isset($type) && $type == 'select')
    <div class="form-group">
        <label>{{ $label or title_case($name) }}</label>
        <select name="{{ $name }}" class="form-control">
            <option value="" hidden="">Selecicona un elemento de la lista</option>

            @if (isset($list) && isset($item_name))
                @foreach ($list as $item)
                    <option value="{{ $item[$item_value] }}" {{ isset($value) && ($value == $item[$item_value]) ? 'selected' : '' }} >{{ $item[$item_name] }}</option>
                @endforeach
            @endif
        </select>

        @if ($errors->has($name))
            <small class="form-text text-muted">{{ $errors->first($name) }}</small>
        @endif
    </div>

@elseif (isset($type) && $type == 'button')
    <button class="btn btn-primary" type="submit">{{ $label or 'Enviar' }}</button>

@else
    <div class="form-group">
        <label>{{ $label or title_case($name) }}</label>
        <input name="{{ $name }}" class="form-control" type="{{ $type or 'text' }}"

        @if (isset($type) && $type != 'password')
            value="{{ $value or old($name) }}">
        @else
            value="{{ $value or '' }}">
        @endif


        @if ($errors->has($name))
            <small class="form-text text-muted">{{ $errors->first($name) }}</small>
        @endif
    </div>
@endif
