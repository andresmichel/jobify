@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            @if (count($job->applications))
                <div class="col-sm-8">
            @else
                <div class="col-sm-8 offset-sm-2">
            @endif

                <div class="flex mb-4">
                    <h3 class="m-0">{{ $job->title }}</h3>
                    <a class="ml-4 my-0" href="{{ url('company/jobs/'.$job->slug.'/edit') }}">
                        <i class="material-icons">edit</i>
                    </a>
                </div>
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
                    </div>
                </div>
            </div>

            @if (count($job->applications))
                <div class="col-sm-4">
                    <h3 class="mb-4">{{ count($job->applications) }} Solicitantes</h3>
                    <div class="card mb-5">
                        <ul class="list-group list-group-flush" style="max-height:400px; overflow-y:auto;">
                            @foreach ($job->applications as $application)
                                <li class="list-group-item d-flex align-items-center {{ $loop->first ? 'border-top-0' : '' }}" style="flex-shrink:0;">
                                    <h6 class="card-title m-0">{{ $application->aspirant->user->name }}</h6>
                                    @if ($application->aspirant->resume)
                                        <a class="btn btn-primary btn-sm ml-auto" href="{{ url("company/jobs/$job->id/aspirant/".$application->aspirant->id) }}">
                                            Currículum
                                        </a>
                                    @else
                                        <a class="btn btn-primary btn-sm ml-auto disabled" href="#">
                                            Currículum
                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
