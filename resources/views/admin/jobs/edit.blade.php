@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-block">
                        @component('components.form')
                            @slot('action', url('admn/jobs', $job->id))
                            @slot('method_field', 'PUT')

                            @component('components.input')
                                @slot('label', 'Título')
                                @slot('name', 'title')
                                {{ $job->title }}
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
                                {{ $job->area }}
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Descripción')
                                @slot('name', 'description')
                                {{ $job->description }}
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
                                {{ $job->shift }}
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Género')
                                @slot('name', 'gender')
                                {{ $job->gender }}
                                {{-- @slot('hidden', true) --}}
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Requisitos')
                                @slot('name', 'requirements')
                                {{ $job->requirements }}
                                {{-- @slot('hidden', true) --}}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Edad mínima')
                                @slot('name', 'min_age')
                                {{ $job->min_age }}
                                @slot('type', 'age')
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Edad máxima')
                                @slot('name', 'max_age')
                                {{ $job->max_age }}
                                @slot('type', 'age')
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Salario')
                                @slot('name', 'salary')
                                {{ $job->salary }}
                                @slot('type', 'numeric')
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Estado')
                                @slot('name', 'state')
                                {{ $job->state }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Ciudad')
                                @slot('name', 'city')
                                {{ $job->city }}
                            @endcomponent

                            @component('components.checkbox')
                                @slot('label', 'Mostrar oferta de trabajo')
                                @slot('name', 'active')
                                {{ $job->active ? 'checked' : '' }}
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
