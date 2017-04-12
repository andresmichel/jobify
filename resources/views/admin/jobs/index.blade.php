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
            <li class="list-group-item d-block py-4">
                <div class="flex flex-column w-100">
                    <h5 class="card-title">
                        <a href="{{ url('admin/jobs/'.$item->id.'/edit') }}">
                            {{ $item->title}}
                        </a>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $item->company->user->name }}</h6>
                </div>
            </li>
        @endforeach
    @endsection
@endsection
