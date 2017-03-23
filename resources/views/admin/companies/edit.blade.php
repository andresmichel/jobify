@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-block">
                        @component('components.form')
                            @slot('action', url('admin/companies', $company->id))

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            @component('components.input')
                                @slot('label', 'Nombre de la empresa')
                                @slot('name', 'name')
                                {{ $company->user->name }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Correo electrónico')
                                @slot('name', 'email')
                                @slot('type', 'email')
                                {{ $company->user->email }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Contraseña')
                                @slot('name', 'password')
                                @slot('type', 'password')
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Confirmar contraseña')
                                @slot('name', 'password')
                                @slot('type', 'password_confirmation')
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Descripción')
                                @slot('name', 'description')
                                {{ $company->description }}
                            @endcomponent

                            @component('components.file')
                                @slot('label', 'Logotipo')
                                @slot('name', 'logo')
                                {{ $company->logo }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Sitio Web')
                                @slot('name', 'website')
                                {{ $company->website }}
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Categoría')
                                @slot('name', 'category')
                                {{ $company->category }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Número de empleados')
                                @slot('name', 'employees')
                                {{ $company->employees }}
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Estado')
                                @slot('name', 'state')
                                <option>Baja California</option>
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Ciudad')
                                @slot('name', 'city')
                                {{ $company->city }}
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Domicilio')
                                @slot('name', 'address')
                                {{ $company->address }}
                            @endcomponent

                            @component('components.input')
                                @slot('label', 'Teléfono')
                                @slot('name', 'phone')
                                @slot('type', 'phone')
                                {{ $company->phone }}
                            @endcomponent

                            @component('components.button')
                                Guardar
                            @endcomponent

                            <button class="btn btn-danger" form="delete" type="submit">Eliminar</button>
                        @endcomponent

                        <form id="delete" action="{{ url('admin/companies', $company->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                    </div>
                </div>
            </div>
            @if ($company->jobs)
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header" style="background-color:#fff;">
                            Ofertas de trabajo
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($company->jobs as $job)
                                <li class="list-group-item {{ $loop->first ? 'border-top-0' : '' }}">
                                    <a href="{{ url('admin/jobs/'.$job->id.'/edit') }}">{{ $job->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
