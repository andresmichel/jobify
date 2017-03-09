@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-block">
                        <form action="{{ url('vacancies') }}" method="get">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input name="search" type="text" class="form-control" placeholder="Escribe un puesto o área">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-primary btn-block" type="submit">Buscar</button>
                                </div>
                                <div class="col-sm-12 mt-3">
                                    <div class="d-flex">
                                        <span>Ordenar por</span>
                                        <a href="?by=date" class="ml-3">Fecha</a>
                                        <a href="?by=salary" class="ml-3">Salario</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card mb-3">
                    <ul class="list-group list-group-flush">
                        @foreach ($vacancies as $vacancy)
                            <li class="list-group-item d-block">
                                <h4 class="card-title"><a href="{{ url('vacancies', $vacancy->slug) }}">{{ $vacancy->title }}</a></h4>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $vacancy->company->user->name }} - {{ $vacancy->state }}, {{ $vacancy->city }}</h6>
                                <p class="card-text">
                                    {{ date_format(date_create($vacancy->created_at), 'M d, Y') }} -
                                    {{ str_limit($vacancy->description) }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{ $vacancies->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
