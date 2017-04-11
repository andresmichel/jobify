@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4 offset-sm-2">
                <div class="card">
                    <div class="card-block">
                        <a href="{{ url('admin/aspirants') }}">
                            Aspirantes ({{ $aspirants_length }})
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-block">
                        <a href="{{ url('admin/companies') }}">
                            Empresas ({{ $companies_length }})
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
