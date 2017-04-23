@extends('layouts.master')

@section('content')
    <div class="container" id="resumeApp">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <ul class="nav nav-tabs w-100 box-shadow mb-5" style="border:none;">
                    <li class="nav-item w-50 text-center">
                        <a class="w-100 nav-link active" href="{{ url('aspirant/resume/file') }}">Subir documento</a>
                    </li>
                    <li class="nav-item w-50 text-center">
                        <a class="w-100 nav-link" href="{{ url('aspirant/resume') }}">
                            {{ auth()->user()->aspirant->resume ? 'Editar' : 'Crear' }} currículum
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card mb-5">
                                    <div class="card-block">
                                        @component('components.form')
                                            @slot('action', url('aspirant/resume/file'))

                                            @component('components.file')
                                                @slot('name', 'resume')
                                            @endcomponent

                                            <div class="form-group">
                                                @if (auth()->user()->aspirant->resumeFile)
                                                    <small class="form-text text-muted">
                                                        <a href="{{ url('aspirant/resume/download', auth()->user()->aspirant->resumeFile->fullName()) }}" target="_blank">
                                                            Ver documento ({{ auth()->user()->aspirant->resumeFile->fullName() }})
                                                        </a>
                                                    </small>
                                                @endif
                                            </div>

                                            @component('components.button')
                                                Guardar
                                            @endcomponent

                                            @if (auth()->user()->aspirant->resumeFile)
                                                <button class="btn btn-danger" form="delete" type="submit">Eliminar</button>
                                            @endif
                                        @endcomponent

                                        <form id="delete" action="{{ url('aspirant/resume/file') }}" method="post" hidden>
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
