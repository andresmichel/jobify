@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-block">
                        @component('forms.company')
                            @slot('action', url('admin/companies'))
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
