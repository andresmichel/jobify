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
                                @slot('avatar', 'Ver foto de perfil')
                                @slot('avatar_url', asset($aspirant->user->avatar))
                            @endif
                        @endcomponent
                    </div>
                </div>
            </div>
            @if ($aspirant->resume || $aspirant->resumeFile)
                <div class="col-sm-4">
                    <h3 class="mb-4">Currículum</h3>
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            @if ($aspirant->resumeFile)
                                <li class="list-group-item flex border-top-0">
                                    <span class="text-truncate mr-auto">
                                        Currículum (documento)
                                    </span>

                                    <form id="deleteResumeFile" action="{{ url('admin/resumes/file', $aspirant->resumeFile->id) }}" method="post" hidden>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <button form="deleteResumeFile" type="submit" style="background-color:inherit;">
                                        <i class="material-icons text-danger">delete</i>
                                    </button>
                                </li>
                            @endif

                            @if ($aspirant->resume)
                                <li class="list-group-item flex">
                                    <span class="text-truncate mr-auto">
                                        Currículum (virtual)
                                    </span>

                                    <form id="deleteResume" action="{{ url('admin/resumes', $aspirant->resume->id) }}" method="post" hidden>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <button form="deleteResume" type="submit" style="background-color:inherit;">
                                        <i class="material-icons text-danger">delete</i>
                                    </button>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
