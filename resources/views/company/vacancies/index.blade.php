@extends('layouts.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Vacantes</li>
@endsection

@section('content')
    @include('partials.breadcrumb')

    <a href="{{ url('company/vacancies/create') }}">
        <div style="display:flex;
            width:60px; height:60px; position:fixed;
            bottom:30px; right:120px; background-color:#0275d8;
            z-index:1; border-radius:50%; align-items:center;
            justify-content:center; color:#fff; font-size:32px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);">
            <span style="display:inline-block; margin-bottom:7px;">+</span>
        </div>
    </a>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <ul class="list-group list-group-flush">
                        @foreach ($vacancies as $vacancy)
                            <li class="list-group-item d-block">
                                <h4 class="card-title"><a href="{{ url('company/vacancies', $vacancy->slug) }}">{{ $vacancy->title }}</a></h4>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $vacancy->company->user->name }} - {{ $vacancy->state }}, {{ $vacancy->city }}</h6>
                                <p class="card-text">{{ $vacancy->description }}</p>
                                <h6 class="card-subtitle mb-2 text-muted">{{ date_format(date_create($vacancy->created_at), 'M d, Y') }}</h6>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{ $vacancies->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
