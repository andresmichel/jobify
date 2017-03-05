@component('components.form')
    @slot('action', url('register/aspirant'))
    {{ csrf_field() }}

    @component('components.input')
        @slot('label', 'Nombre completo')
        @slot('name', 'name')
    @endcomponent

    @component('components.input')
        @slot('label', 'Correo electrónico')
        @slot('name', 'email')
        @slot('type', 'email')
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
        @slot('label', 'Fotografía')
        @slot('name', 'picture')
    @endcomponent

    @component('components.select')
        @slot('label', 'Género')
        @slot('name', 'gender')
    @endcomponent

    @component('components.input')
        @slot('label', 'Estado')
        @slot('name', 'state')
    @endcomponent

    @component('components.input')
        @slot('label', 'Ciudad')
        @slot('name', 'city')
    @endcomponent

    @component('components.input')
        @slot('label', 'Teléfono')
        @slot('name', 'phone')
        @slot('type', 'phone')
    @endcomponent

    @component('components.button')
        Registrarme
    @endcomponent
@endcomponent
