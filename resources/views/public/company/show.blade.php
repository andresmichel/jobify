@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <h3 class="mb-4">{{ $company->user->name }}</h3>
                <div class="card mb-5">
                    <div class="card-block row">
                        <div class="col-sm-4 flex flex-center">
                            <div class="avatar" style="background-image:url('{{ asset($company->user->avatar) }}'); width:220px; height:140px;"></div>
                        </div>
                        <div class="col-sm-8 flex flex-column">
                            <h6 class="text-muted mb-1">Descripción</h6>
                            <p>{{ $company->description }}</p>

                            <h6 class="text-muted mb-1">Correo electrónico</h6>
                            <p>{{ $company->user->email }}</p>

                            <h6 class="text-muted mb-1">Dirección</h6>
                            <p class="mb-0">{{ $company->address }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <h3 class="mb-4">Ofertas de trabajo</h3>
                <div class="card mb-5">
                    <ul class="list-group list-group-flush">
                        @if (count($jobs))
                            @foreach ($jobs as $job)
                                @include('partials.job-item')
                            @endforeach
                        @else
                            <li class="list-group-item d-block">
                                <p class="card-text py-2">
                                    {{ $company->user->name }} no tiene ofertas de trabajo.
                                </p>
                            </li>
                        @endif
                    </ul>
                </div>
                {{ $jobs->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
