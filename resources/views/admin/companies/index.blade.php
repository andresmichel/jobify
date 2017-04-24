@extends('layouts.list')

@section('content')
    <a href="{{ url('admin/companies/create') }}" class="fav-button">
        <i class="material-icons">add</i>
    </a>

    @parent

    @section('data')
        @if (!count($items))
            <li class="list-group-item d-block">
                <p class="card-text py-2">
                    No hay empresas.
                </p>
            </li>
        @endif

        @foreach ($items as $item)
            <li class="list-group-item d-block py-4">
                <div class="flex">
                    <div class="flex">
                        <div class="avatar" style="background-image:url('{{ asset($item->user->avatar) }}')"></div>
                    </div>
                    <div class="ml-4 flex flex-column w-100">
                        <h5 class="card-title">
                            <a href="{{ url('admin/companies/'.$item->id.'/edit') }}">
                                {{ $item->user->name}}
                            </a>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $item->user->email }}</h6>
                    </div>
                </div>
            </li>
        @endforeach
    @endsection
@endsection
