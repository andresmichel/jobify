@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-10 offset-sm-1">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-block text-center">
                                <a href="{{ url('register/aspirant') }}" class="btn btn-primary mr-5">Asistente</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-block text-center">
                                <a href="{{ url('register/company') }}" class="btn btn-primary">Compañía</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
