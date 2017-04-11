@extends('layouts.list')

@section('content')
    <a href="{{ url('admin/companies/create') }}" class="fav-button">
        <i class="material-icons">add</i>
    </a>


    @parent

    @section('data')
        @if (!count($items))
            <li class="list-group-item d-block">
                <p class="card-text">
                    No hay empresas.
                </p>
            </li>
        @endif

        @foreach ($items as $item)
            <li class="list-group-item d-block">
                <h4 class="card-title"><a href="{{ url('admin/companies/'.$item->id.'/edit') }}">{{ $item->user->name}}</a></h4>
                <h6 class="card-subtitle mb-2 text-muted">{{ $item->description }}</h6>
            </li>
        @endforeach
    @endsection
@endsection
