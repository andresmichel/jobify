@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                @if (! count($aspirants))
                    <div class="card">
                        <div class="card-block">
                            No tienes ofertas de trabajo.
                        </div>
                    </div>
                @else
                    <div class="card mb-5">
                        <ul class="list-group list-group-flush">
                            @foreach ($aspirants as $aspirant)
                                <li class="list-group-item d-block py-4">
                                    <div class="flex">
                                        <div class="flex flex-column w-100">
                                            <div class="flex w-100">
                                                <h5 class="card-title"><a href="{{ url('company/aspirants', $aspirant->id) }}" class="fw-300">{{ $aspirant->user->name }}</a></h5>
                                                <p class="card-subtitle mb-2 ml-auto text-nowrap">{{ $aspirant->user->name ? 'Activa' : 'Oculta' }}</p>
                                            </div>
                                            <div class="flex w-100">
                                                <p class="card-subtitle mb-2">
                                                    {{ $aspirant->user->name }} Solicitantes
                                                </p>
                                                <p class="card-subtitle mb-2 ml-auto flex">
                                                    <i class="material-icons mr-1 text-muted">place</i>
                                                    {{ $aspirant->state }}, {{ $aspirant->city }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{ $aspirants->links('vendor.pagination.bootstrap-4') }}
                @endif
            </div>
        </div>
    </div>
@endsection
