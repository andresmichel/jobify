@extends('layouts.list')

@section('header')

@endsection

@section('content')
    <div class="container-fixed">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{ url('admin/aspirants/create') }}" class="fav-button">
                        <i class="material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @parent

    @section('data')
        @foreach ($items as $item)
            @if (!count($items))
                <li class="list-group-item d-block">
                    <p class="card-text py-2">
                        No hay aspirantes.
                    </p>
                </li>
            @endif

            <li class="list-group-item d-block py-4">
                <div class="flex">
                    <div class="flex">
                        <div class="avatar" style="background-image:url('{{ asset($item->user->avatar) }}')"></div>
                    </div>
                    <div class="ml-4 flex flex-column w-100">
                        <h5 class="card-title">
                            <a href="{{ url('admin/aspirants/'.$item->id.'/edit') }}">
                                {{ $item->user->name }}
                            </a>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $item->user->email }}</h6>
                    </div>
                </div>
            </li>
        @endforeach
    @endsection

@endsection
