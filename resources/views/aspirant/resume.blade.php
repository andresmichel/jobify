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
                        @component('components.form')
                            @slot('action', url('aspirant/resume'))

                            {{ csrf_field() }}

                            @component('components.file')
                                @slot('label', 'Currículum')
                                @slot('name', 'resume')
                            @endcomponent

                            <div class="form-group">
                                @if (auth()->user()->aspirant->resume)
                                    <small class="form-text text-muted">
                                        <a href="{{ url(auth()->user()->aspirant->resume->path) }}">
                                            {{ auth()->user()->aspirant->resume->name.'.'.auth()->user()->aspirant->resume->ext }}</small>
                                        </a>
                                @endif
                            </div>

                            @component('components.button')
                                Guardar
                            @endcomponent
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
