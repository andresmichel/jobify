@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card mb-5">
                    <ul class="list-group list-group-flush">
                        @yield('data')
                    </ul>
                </div>

                {{ $items->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
