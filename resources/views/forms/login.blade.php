@component('components.form')
    @slot('action', url('/login'))

    {{ csrf_field() }}

    <input style="display:none" type="text" name="email"/>
    <input style="display:none" type="password" name="password"/>

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

    @component('components.checkbox')
        @slot('label', 'Recordar')
        @slot('name', 'remember')
    @endcomponent

    @component('components.button')
        Iniciar sesión
    @endcomponent
@endcomponent
