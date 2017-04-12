@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-block">
                        @component('components.form')
                            @slot('action', url('register/company'))

                            @component('components.input')
                                @slot('label', 'Nombre de la empresa')
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
                                @slot('name', 'password')
                                @slot('type', 'password_confirmation')
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Descripción')
                                @slot('name', 'description')
                            @endcomponent

                            @component('components.file')
                                @slot('label', 'Logotipo')
                                @slot('name', 'avatar')
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Sitio Web')
                                @slot('name', 'website')
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Categoría')
                                @slot('name', 'category')
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Número de empleados')
                                @slot('name', 'employees')
                                @slot('type', 'numeric')
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Estado')
                                @slot('name', 'state')
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Ciudad')
                                @slot('name', 'city')
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Domicilio')
                                @slot('name', 'address')
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
