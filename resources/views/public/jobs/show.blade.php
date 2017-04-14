@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h3 class="mb-4">{{ $job->title }}</h3>
                <div class="card mb-5">
                    <div class="card-block">
                        <h5 class="text-muted mb-1">Descripción</h5>
                        <p>{{ $job->description }}</p>

                        <h5 class="text-muted mb-1">Requerimientos</h5>
                        <p>{{ $job->requirements }}</p>

                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="text-muted mb-1">Área</h5>
                                <p>{{ $job->area }}</p>
                            </div>
                            <div class="col-sm-6">
                                <h5 class="text-muted mb-1">Horario</h5>
                                <p>{{ $job->fulltime ? 'Tiempo completo' : 'Medio tiempo' }}</p>
                            </div>
                            <div class="col-sm-6">
                                <h5 class="text-muted mb-1">Turno</h5>
                                <p>{{ $job->shift }}</p>
                            </div>

                            @if ($job->salary)
                                <div class="col-sm-6">
                                    <h5 class="text-muted mb-1">Salario</h5>
                                    <p>{{ $job->salary }}</p>
                                </div>
                            @endif

                            <div class="col-sm-6">
                                <h5 class="text-muted mb-1">Ubicación</h5>
                                <p>{{ $job->city }}, {{ $job->state }}</p>
                            </div>

                            @if ($job->min_age)
                                <div class="col-sm-6">
                                    <h5 class="text-muted mb-1">Edad</h5>
                                    <p>
                                        A partir de {{ $job->min_age }} años
                                        @if ($job->max_age)
                                            hasta {{ $job->max_age }} años.
                                        @endif
                                    </p>
                                </div>
                            @endif
                        </div>

                        <form action="{{ url('aspirant/applications', $job->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            @if (auth()->check() && $job->applied())
                                <button type="submit" class="btn btn-danger btn-block">Cancelar solicitud</button>
                            @else
                                <button type="submit" class="btn btn-primary btn-block">Enviar mi currículum</button>
                            @endif
                        </form>
                    </div>
                </div>

                <h3 class="mb-4">Ofertas de trabajo similares</h3>
                <div class="card mb-5">
                    <ul class="list-group list-group-flush">
                        @foreach ($related_jobs as $job_loop)
                            @include('partials.job-item', ['job' => $job_loop])
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <h3 class="mb-4">{{ $job->company->user->name }}</h3>
                <div class="card mb-5">
                    <div class="card-block">
                        <h5 class="text-muted mb-1">Descripción</h5>
                        <p>{{ $job->company->description }}</p>

                        <h5 class="text-muted mb-1">Correo electrónico</h5>
                        <p>{{ $job->company->user->email }}</p>

                        <a href="{{ url('company', $job->company->slug) }}" class="btn btn-primary btn-block-off text-truncate">Ver ofertas de trabajo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
