@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-block">
                        @include('partials.forms.login')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
