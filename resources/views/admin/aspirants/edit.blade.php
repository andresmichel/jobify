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
                        @endcomponent
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
