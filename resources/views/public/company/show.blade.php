@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-8">
                <div class="card mb-3">
                    <ul class="list-group list-group-flush">
                        @foreach ($vacancies as $vacancy)
                            <li class="list-group-item d-block">
                                <h4 class="card-title"><a href="{{ url('vacancies', $vacancy->slug) }}">{{ $vacancy->title }}</a></h4>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $vacancy->company->user->name }} - {{ $vacancy->state }}, {{ $vacancy->city }}</h6>
                                <p class="card-text">
                                    {{ date_format(date_create($vacancy->created_at), 'M d, Y') }} -
                                    {{ str_limit($vacancy->description, 60) }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>
                {{ $vacancies->links('vendor.pagination.bootstrap-4') }}
            </div>
            <div class="col-sm-4">
                <div class="card mb-3">
                    <div class="card-block">
                        <p>{{ $company->user->name }}</p>
                        <p>{{ $company->user->email }}</p>
                        <p>{{ $company->description }}</p>
                        <p>{{ $company->address }}</p>
                        <p>{{ $company->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
