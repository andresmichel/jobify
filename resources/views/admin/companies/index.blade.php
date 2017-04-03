@extends('layouts.list')

@section('content')
    <a href="{{ url('admin/companies/create') }}">
        <div style="display:flex;
            width:60px; height:60px; position:fixed;
            bottom:30px; right:120px; background-color:#0275d8;
            z-index:1; border-radius:50%; align-items:center;
            justify-content:center; color:#fff; font-size:32px;
            box-shadow: 0 5px 10px rgba(0, 0, 200, 0.25);">
            <span style="display:inline-block; margin-bottom:8px;">+</span>
        </div>
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
