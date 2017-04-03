@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-block">
                        <form action="{{ url('jobs') }}" method="get">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input name="search" type="text" class="form-control" placeholder="Escribe un puesto o área">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-primary btn-block" type="submit" style="height:38px;">
                                        <i class="material-icons">search</i>
                                    </button>
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
                        @if (!count($jobs))
                            <li class="list-group-item d-block">
                                <p class="card-text">
                                    No hay resultados.
                                </p>
                            </li>
                        @endif

                        @foreach ($jobs as $job)
                            <li class="list-group-item d-block">
                                <h4 class="card-title"><a href="{{ url('jobs', $job->slug) }}">{{ $job->title }}</a></h4>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $job->company->user->name }} - {{ $job->state }}, {{ $job->city }}</h6>
                                <p class="card-text">
                                    {{ date_format(date_create($job->created_at), 'M d, Y') }} -
                                    {{ str_limit($job->description) }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{ $jobs->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
