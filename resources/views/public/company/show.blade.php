@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-5">
                    <div class="card-block">
                        <h3 class="card-title mb-5">{{ $company->user->name }}</h3>
                        <p>Email: {{ $company->user->email }}</p>
                        <p>Descripción: {{ $company->description }}</p>
                        <p>Domicilio: {{ $company->address }}</p>
                        <p>Teléfono: {{ $company->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <h3 class="mb-4">Ofertas de trabajo</h3>
                <div class="card mb-5">
                    <ul class="list-group list-group-flush">
                        @foreach ($jobs as $job)
                            @include('partials.job-item')
                        @endforeach
                    </ul>
                </div>
                {{ $jobs->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
