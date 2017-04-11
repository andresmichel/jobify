@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="card mb-5">
                    <div class="card-block">
                        <h3 class="card-title mb-5">{{ $job->title }}</h3>
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

                <div class="card mb-5">
                    <div class="card-header" style="background-color:#fff;">
                        Ofertas de trabajo similares
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($related_jobs as $job_loop)
                            @include('partials.job-item', ['job' => $job_loop])
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mb-5">
                    <div class="card-block">
                        <h3 class="card-title mb-5">{{ $job->company->user->name }}</h3>
                        <p>Área: {{ $job->area }}</p>
                        <p>Horario: {{ $job->schedule }}</p>
                        <p>Salario: {{ $job->salary }}</p>
                        <a href="{{ url('company', $job->company->slug) }}" class="btn btn-primary btn-block text-truncate">Ofertas de trabajo de {{ $job->company->user->name }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
