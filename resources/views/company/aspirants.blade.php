@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card mb-5">
                    <div class="card-block">
                        <form action="{{ url('company/aspirants') }}" method="get">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input name="q" type="text" class="form-control" placeholder="Escribe un nombre o correo" value="{{ request()->q ?: '' }}">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-primary btn-block" type="submit" style="height:38px;">
                                        <i class="material-icons">search</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if (! count($aspirants))
                    <div class="card">
                        <div class="card-block">
                            No se encontraron aspirantes.
                        </div>
                    </div>
                @else
                    <div class="card mb-5">
                        <ul class="list-group list-group-flush">
                            @foreach ($aspirants as $aspirant)
                                <li class="list-group-item d-block py-4">
                                    <div class="flex">
                                        <div class="flex w-100">
                                            <div class="flex-column w-100">
                                                <h5 class="card-title">
                                                    <a href="{{ url('company/aspirants', $aspirant->id) }}" class="fw-300">
                                                        {{ $aspirant->user->name }}
                                                    </a>
                                                </h5>
                                                <p class="card-subtitle mb-2">
                                                    {{ $aspirant->user->email }}
                                                </p>
                                            </div>
                                            <div class="flex w-100">
                                                @if ($aspirant->resume || $aspirant->resumeFile)
                                                    <a href="{{ url('company/aspirants', $aspirant->id) }}" class="ml-auto text-nowrap btn btn-primary" target="_blank">Ver currículum</a>
                                                @else
                                                    <a href="#" class="ml-auto text-nowrap btn btn-primary disabled">Currículum no disponible</a>
                                                @endif
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
