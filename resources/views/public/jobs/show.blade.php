@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h3 class="mb-4">{{ $job->title }}</h3>
                <div class="card mb-5">
                    <div class="card-block">
                        <h6 class="text-muted mb-1">Descripción</h6>
                        <p>{{ $job->description }}</p>

                        <h6 class="text-muted mb-1">Requerimientos</h6>
                        <p>{{ $job->requirements }}</p>

                        <div class="row">
                            <div class="col-sm-6">
                                <h6 class="text-muted mb-1">Área</h6>
                                <p>{{ $job->area }}</p>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="text-muted mb-1">Horario</h6>
                                <p>{{ $job->fulltime ? 'Tiempo completo' : 'Medio tiempo' }}</p>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="text-muted mb-1">Turno</h6>
                                <p>{{ $job->shift }}</p>
                            </div>

                            @if ($job->salary)
                                <div class="col-sm-6">
                                    <h6 class="text-muted mb-1">Salario</h6>
                                    <p>{{ $job->salary }}</p>
                                </div>
                            @endif

                            <div class="col-sm-6">
                                <h6 class="text-muted mb-1">Ubicación</h6>
                                @if ($job->remote)
                                    <p>Remoto</p>
                                @else
                                    <p>{{ $job->city }}, {{ $job->state }}</p>
                                @endif
                            </div>
                        </div>

                        @if (auth()->guest())
                            <a href="{{ url('login') }}"class="btn btn-primary">Enviar mi currículum</a>
                        @else
                            <form action="{{ url('aspirant/applications', $job->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                @if (auth()->check() && $job->applied())
                                    <button type="submit" class="btn btn-danger">Cancelar solicitud</button>
                                @else
                                    <button type="submit" class="btn btn-primary">Enviar mi currículum</button>
                                @endif
                            </form>
                        @endif
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
                        <h6 class="text-muted mb-1">Descripción</h6>
                        <p>{{ $job->company->description }}</p>

                        <h6 class="text-muted mb-1">Correo electrónico</h6>
                        <p>{{ $job->company->user->email }}</p>

                        <a href="{{ url('company', $job->company->slug) }}" class="btn btn-primary btn-block-off text-truncate">Ver ofertas de trabajo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
