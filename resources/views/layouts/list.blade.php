@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <ul class="list-group list-group-flush">
                        @yield('data')
                    </ul>
                </div>

                {{ $items->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
