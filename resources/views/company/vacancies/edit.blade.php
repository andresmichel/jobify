@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-block">
                        @component('components.form')
                            @slot('action', url('company/vacancies', $vacancy->id))

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            @component('components.input')
                                @slot('label', 'Título')
                                @slot('name', 'title')
                                {{ $vacancy->title }}
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Descripción')
                                @slot('name', 'description')
                                {{ $vacancy->description }}
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Contrato')
                                @slot('name', 'contract')
                                {{ $vacancy->contract }}
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Área')
                                @slot('name', 'area')
                                <option {{ $vacancy->area == 'Ventas' ? 'selected' : '' }}>Ventas</option>
                                <option {{ $vacancy->area == 'Recursos Humanos' ? 'selected' : '' }}>Recursos Humanos</option>
                                <option {{ $vacancy->area == 'Sistemas' ? 'selected' : '' }}>Sistemas</option>
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Educación')
                                @slot('name', 'education')
                                <option {{ $vacancy->education == 'Universidad' ? 'selected' : '' }}>Universidad</option>
                                <option {{ $vacancy->education == 'Preparatoria' ? 'selected' : '' }}>Preparatoria</option>
                                <option {{ $vacancy->education == 'Doctorado' ? 'selected' : '' }}>Doctorado</option>
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Turno')
                                @slot('name', 'shift')
                                <option {{ $vacancy->shift == 'Matutino' ? 'selected' : '' }}>Matutino</option>
                                <option {{ $vacancy->shift == 'Vespertino' ? 'selected' : '' }}>Vespertino</option>
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Género')
                                @slot('name', 'gender')
                                <option value="male" {{ $vacancy->gender == 'male' ? 'selected' : '' }}>Hombre</option>
                                <option value="female" {{ $vacancy->gender == 'female' ? 'selected' : '' }}>Mujer</option>
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Experiencia')
                                @slot('name', 'experience')
                                {{ $vacancy->experience }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Edad mínima')
                                @slot('name', 'min_age')
                                {{ $vacancy->min_age }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Edad máxima')
                                @slot('name', 'max_age')
                                {{ $vacancy->max_age }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Horario')
                                @slot('name', 'schedule')
                                {{ $vacancy->schedule }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Horas a la semana')
                                @slot('name', 'hours')
                                {{ $vacancy->hours }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Salario')
                                @slot('name', 'salary')
                                {{ $vacancy->salary }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Idiomas')
                                @slot('name', 'language')
                                {{ $vacancy->language }}
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Estado')
                                @slot('name', 'state')
                                <option {{ $vacancy->state == 'Baja California' ? 'selected' : '' }}>Baja California</option>
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Ciudad')
                                @slot('name', 'city')
                                {{ $vacancy->city }}
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Estatus')
                                @slot('name', 'status')
                                <option value="1" {{ $vacancy->status == "1" ? 'selected' : '' }}>Abierto</option>
                                <option value="0" {{ $vacancy->status == "0" ? 'selected' : '' }}>Cerrado</option>
                            @endcomponent

                            @component('components.button')
                                Guardar
                            @endcomponent

                            <button class="btn btn-danger" form="delete" type="submit">Eliminar</button>
                        @endcomponent

                        <form id="delete" action="{{ url('company/vacancies', $vacancy->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
