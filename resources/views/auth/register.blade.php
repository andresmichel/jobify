@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-6 offset-sm-3 text-center">
                <a href="{{ url('register/aspirant') }}" class="btn btn-primary mr-5">Asistente</a>
                <a href="{{ url('register/company') }}" class="btn btn-primary">Compañía</a>
            </div>
        </div>
    </div>
@endsection
