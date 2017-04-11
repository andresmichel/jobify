@extends('layouts.master')

@section('header')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-5">
                    <div class="card-block">
                        <form action="{{ url('jobs') }}" method="get">
                            <div class="row ">
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input name="search" type="text" class="form-control" placeholder="Escribe un puesto o área">
                                    </div>
                                </div>
                                <div class="col-sm-3 flex flex-center">
                                    <button class="btn btn-primary btn-block" type="submit" style="height:38px;">
                                        <i class="material-icons">search</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="w-100" style="display:flex; justify-content:space-between;overflow-x: auto;">
                    @foreach ($companies as $company)
                        <div class="card">
                            <div class="card-block" style="height:100px; width:200px;">{{ $company->user->name }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
