@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-8">
                <div class="card mb-3">
                    <div class="card-header" style="background-color:#fff;">
                        {{ $vacancy->title }}
                        <a class="float-right" href="{{ url('company/vacancies/'.$vacancy->slug.'/edit') }}">Editar</a>
                    </div>
                    <div class="card-block">
                        <p class="card-text">{!! $vacancy->description !!}</p>
                        <p class="card-text">{!! $vacancy->description !!}</p>

                        <h5 class="card-title">Experiencia</h5>
                        <p class="card-text">{{ $vacancy->experience }}</p>

                        <h5 class="card-title">Salario</h5>
                        <p class="card-text">{{ $vacancy->salary }}</p>

                        <h5 class="card-title">Ubicación</h5>
                        <p class="card-text">{{ $vacancy->state }}, {{ $vacancy->city }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mb-3">
                    <div class="card-header" style="background-color:#fff;">
                        {{ count($vacancy->applications) }} Solicitantes
                    </div>
                    <ul class="list-group list-group-flush" style="max-height:400px; overflow-y:auto;">
                        @foreach ($vacancy->applications as $application)
                            <li class="list-group-item d-flex align-items-center {{ $loop->first ? 'border-top-0' : '' }}" style="flex-shrink:0;">
                                <h6 class="card-title m-0">{{ $application->aspirant->user->name }}</h6>
                                {{-- @if ($application->aspirant->resume) --}}
                                @if ($application->aspirant->resume)
                                    <a class="btn btn-primary btn-sm ml-auto" href="{{ url($application->aspirant->resume->path) }}">Currículum</a>
                                @else
                                    <a class="btn btn-primary btn-sm ml-auto disabled" href="#">Currículum</a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
