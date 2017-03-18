@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-8">
                <div class="card mb-3">
                    <div class="card-block">
                        <h3 class="card-title mb-3">{{ $job->title }}</h3>
                        <p class="card-text">{!! $job->description !!}</p>

                        <h5 class="card-title">Experiencia</h5>
                        <p class="card-text">{{ $job->experience }}</p>

                        <h5 class="card-title">Salario</h5>
                        <p class="card-text">{{ $job->salary }}</p>

                        <h5 class="card-title">Ubicación</h5>
                        <p class="card-text">{{ $job->state }}, {{ $job->city }}</p>

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

                <div class="card mb-3">
                    <div class="card-header" style="background-color:#fff;">
                        Ofertas de trabajo similares
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($related_jobs as $job_loop)
                            <li class="list-group-item {{ $loop->first ? 'border-top-0' : '' }}">
                                <h5 class="card-title w-100"><a href="{{ url('jobs', $job_loop->slug) }}">{{ $job_loop->title }}</a></h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $job_loop->state }} - {{ $job_loop->city }}</h6>
                                <p class="card-text">{{ $job_loop->description }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mb-3">
                    <div class="card-block">
                        <h3 class="card-title mb-3">{{ $job->company->user->name }}</h3>
                        <p>Área: {{ $job->area }}</p>
                        <p>Horario: {{ $job->schedule }}</p>
                        <p>Salario: {{ $job->salary }}</p>
                        <a href="{{ url('company', $job->company->slug) }}" class="btn btn-primary btn-block">Ofertas de trabajo de {{ $job->company->user->name }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
