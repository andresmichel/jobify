@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-5 offset-sm-1">
                <div class="card">
                    <div class="card-block text-center">
                        <ul class="p-0" style="list-style:none;">
                            <li class="py-1">Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                            <li class="py-1">Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                            <li class="py-1">Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                            <li class="py-1">Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                            <li class="py-1">Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                            <li class="py-1">Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                            <li class="py-1">Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                            <li class="py-1">Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                        </ul>
                        <a href="{{ url('register/aspirant') }}" class="btn btn-block btn-primary mr-5">Asistente</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-block text-center">
                        <ul class="p-0" style="list-style:none;">
                            <li class="py-1">Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                            <li class="py-1">Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                            <li class="py-1">Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                            <li class="py-1">Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                            <li class="py-1">Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                            <li class="py-1">Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                            <li class="py-1">Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                            <li class="py-1">Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                        </ul>
                        <a href="{{ url('register/company') }}" class="btn btn-block btn-primary">Compañía</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
