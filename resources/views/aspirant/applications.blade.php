@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card mb-5">
                    <ul class="list-group list-group-flush">
                        @if (!count($applications))
                            <li class="list-group-item d-block">
                                <p class="card-text">
                                    No tienes solicitudes.
                                </p>
                            </li>
                        @endif

                        @foreach ($applications as $job)
                            <li class="list-group-item d-block py-4">
                                <div class="flex">
                                    <div class="flex">
                                        <img src="" alt="" width="64" height="64">
                                    </div>
                                    <div class="ml-4 flex flex-column w-100">
                                        <h5 class="card-title">
                                            <a href="{{ url('jobs', $job->slug) }}">
                                                {{ $job->title }}
                                            </a>
                                        </h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $job->company->user->name }} - {{ $job->state }}, {{ $job->city }}</h6>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{ $applications->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
