@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row py-5">
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
                                        <a href="{{ url('aspirant/resume/download') }}">
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
