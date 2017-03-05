@extends('layouts.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('aspirant') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Currículum</li>
@endsection

@section('content')
    @include('partials.breadcrumb')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-block">
                        @include('forms.resume.create')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
