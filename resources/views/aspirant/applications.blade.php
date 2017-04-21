@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                @if (! count($applications))
                    <div class="card">
                        <div class="card-block">
                            No tienes solicitudes.
                        </div>
                    </div>
                @else
                    <div class="card mb-5">
                        <ul class="list-group list-group-flush">    
                            @foreach ($applications as $job)
                                @include('partials.job-item')
                            @endforeach
                        </ul>
                    </div>

                    {{ $applications->links('vendor.pagination.bootstrap-4') }}
                @endif
            </div>
        </div>
    </div>
@endsection
