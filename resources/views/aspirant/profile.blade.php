@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-block">
                        @component('components.form')
                            @slot('action', url('aspirant/profile'))
                            @slot('method_field', 'PUT')

                            @component('components.input')
                                @slot('label', 'Nombre completo')
                                @slot('name', 'name')
                                {{ auth()->user()->name }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Correo electrónico')
                                @slot('name', 'email')
                                @slot('type', 'email')
                                {{ auth()->user()->email }}
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
                                {{ auth()->user()->aspirant->birth }}
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Género')
                                @slot('name', 'gender')
                                <option {{ auth()->user()->aspirant->gender == 'M' ? 'selected' : '' }} value="M">Hombre</option>
                                <option {{ auth()->user()->aspirant->gender == 'F' ? 'selected' : '' }} value="F">Mujer</option>
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Estado')
                                @slot('name', 'state')
                                {{ auth()->user()->aspirant->state }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Ciudad')
                                @slot('name', 'city')
                                {{ auth()->user()->aspirant->city }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Teléfono')
                                @slot('name', 'phone')
                                @slot('type', 'phone')
                                {{ auth()->user()->aspirant->phone }}
                            @endcomponent

                            @component('components.button')
                                Guardar
                            @endcomponent
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
