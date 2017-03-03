@extends('layouts.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('aspirant') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Solicitudes</li>
@endsection

@section('content')
    @include('partials.breadcrumb')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <ul class="list-group list-group-flush">
                        @foreach ($applications as $application)
                            <li class="list-group-item d-block">
                                <h4 class="card-title mb-1">
                                    <a href="{{ url('vacancies', $application[0]->vacancy->slug) }}">
                                        {{ $application[0]->vacancy->title }}
                                    </a>
                                    <span class="float-right">{{ $application->count() }} aspirantes</span>
                                </h4>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
