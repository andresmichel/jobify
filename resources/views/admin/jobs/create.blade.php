@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-block">
                        @component('components.form')
                            @slot('action', url('admin/jobs'))

                            {{ csrf_field() }}

                            @component('components.input')
                                @slot('label', 'Título')
                                @slot('name', 'title')
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Descripción')
                                @slot('name', 'description')
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Contrato')
                                @slot('name', 'contract')
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Área')
                                @slot('name', 'area')
                                <option>Ventas</option>
                                <option>Recursos Humanos</option>
                                <option>Sistemas</option>
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Educación')
                                @slot('name', 'education')
                                <option>Preparatoria</option>
                                <option>Universidad</option>
                                <option>Doctorado</option>
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Turno')
                                @slot('name', 'shift')
                                <option>Matutino</option>
                                <option>Vespertino</option>
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Género')
                                @slot('name', 'gender')
                                <option>Hombre</option>
                                <option>Mujer</option>
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Experiencia')
                                @slot('name', 'experience')
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Edad mínima')
                                @slot('name', 'min_age')
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Edad máxima')
                                @slot('name', 'max_age')
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Horario')
                                @slot('name', 'schedule')
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Horas a la semana')
                                @slot('name', 'hours')
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Salario')
                                @slot('name', 'salary')
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Idiomas')
                                @slot('name', 'language')
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Estado')
                                @slot('name', 'state')
                                <option >Baja California</option>
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Ciudad')
                                @slot('name', 'city')
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Estatus')
                                @slot('name', 'status')
                                    <option value="1">Abierto</option>
                                    <option value="0">Cerrado</option>
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
