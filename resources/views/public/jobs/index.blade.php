@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="card mb-5">
                    <div class="card-block">
                        <form action="{{ url('jobs') }}" method="get">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input name="q" type="text" class="form-control" placeholder="Escribe un puesto o área" value="{{ request()->q ?: '' }}">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-primary btn-block" type="submit" style="height:37px;">
                                        <i class="material-icons">search</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mb-5">
                    <ul class="list-group list-group-flush">
                        @if (!count($jobs))
                            <li class="list-group-item d-block">
                                <p class="card-text py-2">
                                    No hay resultados.
                                </p>
                            </li>
                        @endif

                        @foreach ($jobs as $job)
                            @include('partials.job-item')
                        @endforeach
                    </ul>
                </div>

                {{ $jobs->links('vendor.pagination.bootstrap-4') }}
            </div>
            <div class="col-sm-4">
                <div class="card mb-5">
                    <div class="card-block">
                        <a href="{{ url('company/jobs/create') }}" class="btn btn-primary btn-block">Poner oferta de trabajo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
