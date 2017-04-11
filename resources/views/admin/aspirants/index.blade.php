@extends('layouts.list')

@section('content')
    <a href="{{ url('admin/aspirants/create') }}" class="fav-button">
        <i class="material-icons">add</i>
    </a>

    @parent

    @section('data')
        @foreach ($items as $item)
            @if (!count($items))
                <li class="list-group-item d-block">
                    <p class="card-text">
                        No hay aspirantes.
                    </p>
                </li>
            @endif

            <li class="list-group-item d-block">
                <h4 class="card-title"><a href="{{ url('admin/aspirants/'.$item->id.'/edit') }}">{{ $item->user->name }}</a></h4>
                <h6 class="card-subtitle mb-2 text-muted">{{ $item->user->email }}</h6>
            </li>
        @endforeach
    @endsection

@endsection
