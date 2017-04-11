@extends('layouts.list')

@section('content')
    <a href="{{ url('admin/jobs/create') }}" class="fav-button">
        <i class="material-icons">add</i>
    </a>

    @parent

    @section('data')
        @if (!count($items))
            <li class="list-group-item d-block">
                <p class="card-text">
                    No hay ofertas de trabajo.
                </p>
            </li>
        @endif

        @foreach ($items as $item)
            <li class="list-group-item d-block">
                <h4 class="card-title"><a href="{{ url('admin/jobs/'.$item->id.'/edit') }}">{{ $item->title}}</a></h4>
                <h6 class="card-subtitle mb-2 text-muted">{{ $item->company->user->name }}</h6>
            </li>
        @endforeach
    @endsection
@endsection
