@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-block">
                        @component('components.form')
                            @slot('action', url('company/profile'))
                            @slot('method_field', 'PUT')

                            @component('components.input')
                                @slot('label', 'Nombre de la empresa')
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
                                @slot('name', 'password')
                                @slot('type', 'password_confirmation')
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Descripción')
                                @slot('name', 'description')
                                {{ auth()->user()->company->description }}
                            @endcomponent

                            @component('components.file')
                                @slot('label', 'Logotipo')
                                @slot('name', 'avatar')
                                {{ auth()->user()->avatar }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Sitio Web')
                                @slot('name', 'website')
                                {{ auth()->user()->company->website }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Categoría')
                                @slot('name', 'category')
                                {{ auth()->user()->company->category }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Número de empleados')
                                @slot('name', 'employees')
                                @slot('type', 'numeric')
                                {{ auth()->user()->company->employees }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Estado')
                                @slot('name', 'state')
                                {{ auth()->user()->company->state }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Ciudad')
                                @slot('name', 'city')
                                {{ auth()->user()->company->city }}
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Domicilio')
                                @slot('name', 'address')
                                {{ auth()->user()->company->address }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Teléfono')
                                @slot('name', 'phone')
                                @slot('type', 'phone')
                                {{ auth()->user()->company->phone }}
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
