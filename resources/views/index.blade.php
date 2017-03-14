@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <form action="{{ url('jobs') }}" method="get">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input name="search" type="text" class="form-control" placeholder="Escribe un puesto o área">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-primary btn-block" type="submit">Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pb-5">
            <div class="col-sm-12">
                <div class="w-100" style="display:flex; justify-content:space-between;">
                    <div class="card">
                        <div class="card-block" style="height:100px; width:200px;"></div>
                    </div>
                    <div class="card">
                        <div class="card-block" style="height:100px; width:200px;"></div>
                    </div>
                    <div class="card">
                        <div class="card-block" style="height:100px; width:200px;"></div>
                    </div>
                    <div class="card">
                        <div class="card-block" style="height:100px; width:200px;"></div>
                    </div>
                    <div class="card">
                        <div class="card-block" style="height:100px; width:200px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
