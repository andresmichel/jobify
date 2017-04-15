@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <h3 class="mb-4">{{ $company->user->name }}</h3>
                <div class="card mb-5">
                    <div class="card-block row">
                        <div class="col-sm-4 flex flex-center">
                            <img src="{{ asset($company->user->avatar) }}" alt="" class="img-fluid" style="max-height:140px; max-width:160px;">
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
