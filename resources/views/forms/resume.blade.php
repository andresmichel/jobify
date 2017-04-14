@component('components.form')
    @slot('action', $action)

    @if (isset($update) && $update)
        {{ method_field('PUT') }}
    @endif

    @component('components.input')
        @slot('label', 'Nombre completo')
        @slot('name', 'name')
        {{ $name or old('name') }}
    @endcomponent

    @component('components.input')
        @slot('label', 'Correo electrónico')
        @slot('name', 'email')
        @slot('type', 'email')
        {{ $email or old('email') }}
    @endcomponent

    @component('components.checkbox')
        @slot('label', 'Mostrar fotografiía')
        @slot('name', 'picture')
        {{ isset($picture) && $picture ? 'checked' : '' }}
    @endcomponent

    @component('components.input')
        @slot('label', 'Fecha de nacimiento')
        @slot('name', 'birth')
        @slot('type', 'date')
        {{ $birth or old('birth') }}
    @endcomponent

    @component('components.select')
        @slot('label', 'Género')
        @slot('name', 'gender')
        <option {{ isset($gender) && $gender == 'M' ? 'selected' : '' }} value="M">Hombre</option>
        <option {{ isset($gender) && $gender == 'F' ? 'selected' : '' }} value="F">Mujer</option>
    @endcomponent

    @component('components.input')
        @slot('label', 'Estado')
        @slot('name', 'state')
        {{ $state or old('state') }}
    @endcomponent

    @component('components.input')
        @slot('label', 'Ciudad')
        @slot('name', 'city')
        {{ $city or old('city') }}
    @endcomponent

    @component('components.input')
        @slot('label', 'Teléfono')
        @slot('name', 'phone')
        @slot('type', 'phone')
        {{ $phone or old('phone') }}
    @endcomponent

    @component('components.textarea')
        @slot('label', 'Descripción')
        @slot('name', 'description')
        {{ $description or old('description') }}
    @endcomponent

    @component('components.textarea')
        @slot('label', 'Objetivo')
        @slot('name', 'goal')
        {{ $goal or old('goal') }}
    @endcomponent

    @component('components.textarea')
        @slot('label', 'Domicilio')
        @slot('name', 'address')
        {{ $address or old('address') }}
    @endcomponent

    @component('components.textarea')
        @slot('label', 'Datos')
        @slot('name', 'data')
        {{ $data or old('data') }}
        {{-- @slot('hidden', true) --}}
    @endcomponent

    @component('components.button')
        {{ $submit or 'Guardar' }}
    @endcomponent
@endcomponent
