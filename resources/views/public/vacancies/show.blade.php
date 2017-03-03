@extends('layouts.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/vacancies') }}">Vacantes</a></li>
    <li class="breadcrumb-item active">{{ $vacancy->title }}</li>
@endsection

@section('content')
    @include('partials.breadcrumb')

    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="card mb-3">
                    <div class="card-block">
                        <h3 class="card-title mb-3">{{ $vacancy->title }}</h3>
                        <p class="card-text">{!! $vacancy->description !!}</p>

                        <h5 class="card-title">Experiencia</h5>
                        <p class="card-text">{{ $vacancy->experience }}</p>

                        <h5 class="card-title">Salario</h5>
                        <p class="card-text">{{ $vacancy->salary }}</p>

                        <h5 class="card-title">Ubicación</h5>
                        <p class="card-text">{{ $vacancy->state }}, {{ $vacancy->city }}</p>

                            <form action="{{ url('aspirant/applications', $vacancy->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                @if (auth()->check() && $vacancy->applied())
                                    <button type="submit" class="btn btn-danger btn-block">Cancelar solicitud</button>
                                @else
                                    <button type="submit" class="btn btn-primary btn-block">Enviar mi currículum</button>
                                @endif
                            </form>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        Vacantes similares
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($related_vacancies as $vacancy_loop)
                            <li class="list-group-item {{ $loop->first ? 'border-top-0' : '' }}">
                                <h5 class="card-title w-100"><a href="{{ url('vacancies', $vacancy_loop->slug) }}">{{ $vacancy_loop->title }}</a></h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $vacancy_loop->state }} - {{ $vacancy_loop->city }}</h6>
                                <p class="card-text">{{ $vacancy_loop->description }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mb-3">
                    <div class="card-block">
                        <h3 class="card-title mb-3">{{ $vacancy->company->user->name }}</h3>
                        <p>Área: {{ $vacancy->area }}</p>
                        <p>Horario: {{ $vacancy->schedule }}</p>
                        <p>Salario: {{ $vacancy->salary }}</p>
                        <a href="{{ url('company', $vacancy->company->slug) }}" class="btn btn-primary btn-block">Vacantes de {{ $vacancy->company->user->name }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
