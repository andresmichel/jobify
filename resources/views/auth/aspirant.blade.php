@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-block">
                        @component('components.form')
                            @slot('action', url('register/aspirant'))

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
                                @slot('label', 'Foto de perfil')
                                @slot('name', 'avatar')
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Fecha de nacimiento')
                                @slot('name', 'birth')
                                @slot('type', 'date')
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Género')
                                @slot('name', 'gender')
                                <option value="M">Hombre</option>
                                <option value="F">Mujer</option>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
