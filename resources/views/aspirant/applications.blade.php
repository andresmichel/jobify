@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <ul class="list-group list-group-flush">
                        @if (!count($applications))
                            <li class="list-group-item d-block">
                                <p class="card-text">
                                    No tienes solicitudes.
                                </p>
                            </li>
                        @endif

                        @foreach ($applications as $job)
                            <li class="list-group-item d-block">
                                <h4 class="card-title"><a href="{{ url('jobs', $job->slug) }}">{{ $job->title }}</a></h4>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $job->company->user->name }} - {{ $job->state }}, {{ $job->city }}</h6>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{ $applications->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
