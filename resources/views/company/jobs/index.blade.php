@extends('layouts.master')

@section('content')
    <a href="{{ url('company/jobs/create') }}">
        <div style="display:flex;
            width:60px; height:60px; position:fixed;
            bottom:30px; right:120px; background-color:#0275d8;
            z-index:1; border-radius:50%; align-items:center;
            justify-content:center; color:#fff; font-size:32px;
            box-shadow: 0 5px 10px rgba(0, 0, 200, 0.25);">
            <span style="display:inline-block; margin-bottom:8px;">+</span>
        </div>
    </a>

    <div class="container">
        <div class="row py-5">
            <div class="col-sm-10 offset-sm-1">
                <div class="card mb-3">
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
