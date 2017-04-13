@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-block">
                        @component('components.form')
                            @slot('action', url('company/jobs'))

                            @component('components.input')
                                @slot('label', 'Título')
                                @slot('name', 'title')
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Empresa')
                                @slot('name', 'company_id')
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->user->name }}</option>
                                @endforeach
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Área')
                                @slot('name', 'area')
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Descripción')
                                @slot('name', 'description')
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Horario')
                                @slot('name', 'fulltime')
                                <option value="1">Tiempo completo</option>
                                <option value="0">Medio tiempo</option>
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Turno')
                                @slot('name', 'shift')
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Género')
                                @slot('name', 'gender')
                                {{-- @slot('hidden', true) --}}
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Requisitos')
                                @slot('name', 'requirements')
                                {{-- @slot('hidden', true) --}}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Edad mínima')
                                @slot('name', 'min_age')
                                @slot('type', 'age')
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Edad máxima')
                                @slot('name', 'max_age')
                                @slot('type', 'age')
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Salario')
                                @slot('name', 'salary')
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

                            @component('components.checkbox')
                                @slot('label', 'Mostrar oferta de trabajo')
                                @slot('name', 'active')
                                checked
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
