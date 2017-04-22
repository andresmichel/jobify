@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            @if ($aspirant->resume || $aspirant->resumeFile)
                <div class="col-sm-6 offset-sm-1">
            @else
                <div class="col-sm-6 offset-sm-3">
            @endif
                <div class="card">
                    <div class="card-block">
                        @component('forms.aspirant')
                            @slot('action', url('admin/aspirants', $aspirant->id))
                            @slot('update', true)
                            @slot('delete', true)

                            @slot('name', $aspirant->user->name)
                            @slot('email', $aspirant->user->email)
                            @slot('birth', $aspirant->birth)
                            @slot('gender', $aspirant->gender)
                            @slot('state', $aspirant->state)
                            @slot('city', $aspirant->city)
                            @slot('phone', $aspirant->phone)

                            @if ($aspirant->user->avatar)
                                @slot('avatar', 'Ver logotipo')
                                @slot('avatar_url', asset($aspirant->user->avatar))
                            @endif
                        @endcomponent
                    </div>
                </div>
            </div>
            @if ($aspirant->resume || $aspirant->resumeFile)
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header" style="background-color:#fff;">
                            Currículum
                        </div>
                        <ul class="list-group list-group-flush">
                            @if ($aspirant->resumeFile)
                                <li class="list-group-item border-top-0">
                                    <form id="deleteResumeFile" action="{{ url('admin/resumes/file', $aspirant->resumeFile->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <button form="deleteResumeFile" type="submit" class="btn btn-block btn-danger">Eliminar documento</button>
                                </li>
                            @elseif ($aspirant->resume)
                                <li class="list-group-item border-top-0">
                                    <form id="deleteResume" action="{{ url('admin/resumes', $aspirant->resume->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <button form="deleteResume" type="submit" class="btn btn-block btn-danger">Eliminar currículum</button>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
