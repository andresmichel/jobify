<form id="login" action="{{ url('/login') }}" method="post">
    {{ csrf_field() }}

    <input style="display:none" type="text" name="email"/>
    <input style="display:none" type="password" name="password"/>

    @include('partials.input', [
        'name' => 'email',
        'label' => 'Correo electrónico',
        'type' => 'email',
    ])

    @include('partials.input', [
        'name' => 'password',
        'label' => 'Contraseña',
        'type' => 'password',
    ])

    @include('partials.input', [
        'name' => 'remember',
        'label' => 'Recordar',
        'type' => 'checkbox',
    ])

    @include('partials.input', [
        'label' => 'Iniciar sesión',
        'type' => 'button',
    ])
</form>
