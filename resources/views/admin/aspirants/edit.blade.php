@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            @if ($aspirant->resume)
                <div class="col-sm-6 offset-sm-1">
            @else
                <div class="col-sm-6 offset-sm-3">
            @endif
                <div class="card">
                    <div class="card-block">
                        @component('components.form')
                            @slot('action', url('admin/aspirants', $aspirant->id))
                            @slot('method_field', 'PUT')

                            @component('components.input')
                                @slot('label', 'Nombre completo')
                                @slot('name', 'name')
                                {{ $aspirant->user->name }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Correo electrónico')
                                @slot('name', 'email')
                                @slot('type', 'email')
                                {{ $aspirant->user->email }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Contraseña')
                                @slot('name', 'password')
                                @slot('type', 'password')
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Confirmar contraseña')
                                @slot('name', 'password_confirmation')
                                @slot('type', 'password')
                            @endcomponent

                            @component('components.file')
                                @slot('label', 'Foto de perfil')
                                @slot('name', 'avatar')
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Fecha de nacimiento')
                                @slot('name', 'birth')
                                @slot('type', 'date')
                                {{ $aspirant->birth }}
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Género')
                                @slot('name', 'gender')
                                <option {{ $aspirant->gender == 'M' ? 'selected' : '' }} value="M">Hombre</option>
                                <option {{ $aspirant->gender == 'F' ? 'selected' : '' }} value="F">Mujer</option>
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Estado')
                                @slot('name', 'state')
                                {{ $aspirant->state }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Ciudad')
                                @slot('name', 'city')
                                {{ $aspirant->city }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Teléfono')
                                @slot('name', 'phone')
                                @slot('type', 'phone')
                                {{ $aspirant->phone }}
                            @endcomponent

                            @component('components.button')
                                Guardar
                            @endcomponent
                            <button class="btn btn-danger" form="delete" type="submit">Eliminar</button>
                        @endcomponent

                        <form id="delete" action="{{ url('admin/aspirants', $aspirant->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                    </div>
                </div>
            </div>
            @if ($aspirant->resume)
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header" style="background-color:#fff;">
                            Currículum
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item border-top-0">
                                <form id="deleteResume" action="{{ url('admin/resume', $aspirant->resume->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                </form>
                                <button form="deleteResume" type="submit" class="btn btn-block btn-danger">Eliminar</button>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
