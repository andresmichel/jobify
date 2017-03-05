@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-block text-center">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{ url('register/aspirant') }}" class="btn btn-block btn-primary mr-5">Asistente</a>
                            </div>
                            <div class="col-sm-6">
                                <a href="{{ url('register/company') }}" class="btn btn-block btn-primary">Compañía</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
