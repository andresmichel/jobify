@extends('layouts.master')

@section('content')
    <a href="{{ url('company/jobs/create') }}" class="fav-button">
        <i class="material-icons">add</i>
    </a>

    <div class="container">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="card mb-5">
                    <ul class="list-group list-group-flush">
                        @if (!count($jobs))
                            <li class="list-group-item d-block">
                                <p class="card-text">
                                    No tienes ofertas de trabajo.
                                </p>
                            </li>
                        @endif

                        @foreach ($jobs as $job)
                            <li class="list-group-item d-block">
                                <h4 class="card-title">
                                    <a href="{{ url('company/jobs', $job->slug) }}">
                                        {{ str_limit($job->title, 60) }}
                                    </a>
                                    @if (count($job->applications))
                                        <span class="badge badge-success" style="font-size:1rem; font-weight:normal;">
                                            {{ count($job->applications) }} Solicitantes
                                        </span>
                                    @endif
                                    {{-- <a style="font-size:1rem; font-weight:normal;" class="edit-job float-right" href="{{ url('company/jobs/'.$job->slug.'/edit') }}">Editar</a> --}}
                                </h4>
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
