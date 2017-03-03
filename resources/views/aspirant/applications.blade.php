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
                        @foreach ($applications as $vacancy)
                            <li class="list-group-item d-block">
                                <h4 class="card-title"><a href="{{ url('vacancies', $vacancy->slug) }}">{{ $vacancy->title }}</a></h4>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $vacancy->company->user->name }} - {{ $vacancy->state }}, {{ $vacancy->city }}</h6>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{ $applications->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
