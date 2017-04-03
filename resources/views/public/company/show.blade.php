@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-8">
                <div class="card mb-3">
                    <ul class="list-group list-group-flush">
                        @foreach ($jobs as $job)
                            <li class="list-group-item d-block">
                                <h4 class="card-title"><a href="{{ url('jobs', $job->slug) }}">{{ $job->title }}</a></h4>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $job->company->user->name }} - {{ $job->state }}, {{ $job->city }}</h6>
                                <p class="card-text">
                                    {{ date_format(date_create($job->created_at), 'M d, Y') }} -
                                    {{ str_limit($job->description, 60) }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>
                {{ $jobs->links('vendor.pagination.bootstrap-4') }}
            </div>
            <div class="col-sm-4">
                <div class="card mb-3">
                    <div class="card-block">
                        <h3 class="card-title mb-3">{{ $company->user->name }}</h3>
                        <p>Email: {{ $company->user->email }}</p>
                        <p>Descripción: {{ $company->description }}</p>
                        <p>Domicilio: {{ $company->address }}</p>
                        <p>Teléfono: {{ $company->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
