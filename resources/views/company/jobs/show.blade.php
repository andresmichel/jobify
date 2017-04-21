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
                    <a class="ml-4" style="line-height:0;" href="{{ url('company/jobs/'.$job->slug.'/edit') }}">
                        <i class="material-icons">edit</i>
                    </a>
                </div>
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
                                    <p class="card-title m-0">{{ $application->aspirant->user->name }}</p>

                                    @if ($application->aspirant->resumeFile)
                                        <a class="btn btn-primary btn-sm ml-auto"
                                            href="{{ url('company/resumes', $application->aspirant->resumeFile->fullName())
                                                . '?job='
                                                . $job->id
                                                . '&aspirant='
                                                . $application->aspirant->id }}"
                                            target="_blank">
                                            Ver currículum
                                        </a>
                                    @elseif ($application->aspirant->resume)
                                        <a class="btn btn-primary btn-sm ml-auto"
                                            href="{{ url('company/resumes')
                                                . '?job='
                                                . $job->id
                                                . '&aspirant='
                                                . $application->aspirant->id }}"
                                            target="_blank">
                                            Ver currículum
                                        </a>
                                    @else
                                        <a class="btn btn-primary btn-sm ml-auto disabled" href="#">
                                            Currículum no disponible
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
