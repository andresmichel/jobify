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
                            @include('partials.job-item')
                        @endforeach
                    </ul>
                </div>

                {{ $applications->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
