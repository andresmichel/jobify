@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-block">
                        @component('forms.job')
                            @slot('action', url('company/jobs'))
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('vue.requirements')
    @include('vue.remote')
@endsection
