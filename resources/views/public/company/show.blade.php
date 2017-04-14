@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <h3 class="mb-4">{{ $company->user->name }}</h3>
                <div class="card mb-5">
                    <div class="card-block row">
                        <div class="col-sm-3 flex flex-center">
                            <img src="{{ asset('img/apple.png') }}" alt="" class="img-fluid" style="max-height:140px;">
                        </div>
                        <div class="col-sm-9 flex flex-column">
                            <h5 class="text-muted mb-1">Descripción</h5>
                            <p>{{ $company->description }}</p>

                            <h5 class="text-muted mb-1">Correo electrónico</h5>
                            <p>{{ $company->user->email }}</p>

                            <h5 class="text-muted mb-1">Dirección</h5>
                            <p class="mb-0">{{ $company->address }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (count($jobs))
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
        @endif
    </div>
@endsection
