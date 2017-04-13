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

    @component('components.input')
        @slot('label', 'Contraseña')
        @slot('name', 'password')
        @slot('type', 'password')
    @endcomponent

    @component('components.input')
        @slot('label', 'Confirmar contraseña')
        @slot('name', 'password_confirmation')
        @slot('type', 'password')
    @endcomponent

    @component('components.file')
        @slot('label', 'Foto de perfil')
        @slot('name', 'avatar')
    @endcomponent

    @component('components.input')
        @slot('label', 'Fecha de nacimiento')
        @slot('name', 'birth')
        @slot('type', 'date')
        {{ $date or old('birth') }}
    @endcomponent

    @component('components.select')
        @slot('label', 'Género')
        @slot('name', 'gender')
        <option {{ $gender == 'M' ? 'selected' : old('gender') }} value="M">Hombre</option>
        <option {{ $gender == 'F' ? 'selected' : old('gender') }} value="F">Mujer</option>
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

    @component('components.button')
        {{ $submit or 'Guardar' }}
    @endcomponent

    @if (isset($delete) && $delete)
        <button class="btn btn-danger" form="delete" type="submit">Eliminar</button>
    @endif
@endcomponent

@if (isset($delete) && $delete)
    <form id="delete" action="{{ $action }}" method="post" hidden>
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>
@endif
