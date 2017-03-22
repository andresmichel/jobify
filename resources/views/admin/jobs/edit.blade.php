@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-block">
                        @component('components.form')
                            @slot('action', url('admn/jobs', $job->id))

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            @component('components.input')
                                @slot('label', 'Título')
                                @slot('name', 'title')
                                {{ $job->title }}
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Descripción')
                                @slot('name', 'description')
                                {{ $job->description }}
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Contrato')
                                @slot('name', 'contract')
                                {{ $job->contract }}
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Área')
                                @slot('name', 'area')
                                <option {{ $job->area == 'Ventas' ? 'selected' : '' }}>Ventas</option>
                                <option {{ $job->area == 'Recursos Humanos' ? 'selected' : '' }}>Recursos Humanos</option>
                                <option {{ $job->area == 'Sistemas' ? 'selected' : '' }}>Sistemas</option>
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Educación')
                                @slot('name', 'education')
                                <option {{ $job->education == 'Universidad' ? 'selected' : '' }}>Universidad</option>
                                <option {{ $job->education == 'Preparatoria' ? 'selected' : '' }}>Preparatoria</option>
                                <option {{ $job->education == 'Doctorado' ? 'selected' : '' }}>Doctorado</option>
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Turno')
                                @slot('name', 'shift')
                                <option {{ $job->shift == 'Matutino' ? 'selected' : '' }}>Matutino</option>
                                <option {{ $job->shift == 'Vespertino' ? 'selected' : '' }}>Vespertino</option>
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Género')
                                @slot('name', 'gender')
                                <option value="male" {{ $job->gender == 'male' ? 'selected' : '' }}>Hombre</option>
                                <option value="female" {{ $job->gender == 'female' ? 'selected' : '' }}>Mujer</option>
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Experiencia')
                                @slot('name', 'experience')
                                {{ $job->experience }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Edad mínima')
                                @slot('name', 'min_age')
                                {{ $job->min_age }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Edad máxima')
                                @slot('name', 'max_age')
                                {{ $job->max_age }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Horario')
                                @slot('name', 'schedule')
                                {{ $job->schedule }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Horas a la semana')
                                @slot('name', 'hours')
                                {{ $job->hours }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Salario')
                                @slot('name', 'salary')
                                {{ $job->salary }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Idiomas')
                                @slot('name', 'language')
                                {{ $job->language }}
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Estado')
                                @slot('name', 'state')
                                <option {{ $job->state == 'Baja California' ? 'selected' : '' }}>Baja California</option>
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Ciudad')
                                @slot('name', 'city')
                                {{ $job->city }}
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Estatus')
                                @slot('name', 'status')
                                <option value="1" {{ $job->status == "1" ? 'selected' : '' }}>Abierto</option>
                                <option value="0" {{ $job->status == "0" ? 'selected' : '' }}>Cerrado</option>
                            @endcomponent

                            @component('components.button')
                                Guardar
                            @endcomponent

                            <button class="btn btn-danger" form="delete" type="submit">Eliminar</button>
                        @endcomponent

                        <form id="delete" action="{{ url('admin/jobs', $job->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
