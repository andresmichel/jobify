@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-block">
                        @component('forms.job')
                            @slot('action', url('company/jobs', $job->id))
                            @slot('update', true)
                            @slot('delete', true)

                            @slot('title', $job->title)
                            @slot('area', $job->area)
                            @slot('description', $job->description)
                            @slot('fulltime', $job->fulltime)
                            @slot('shift', $job->shift)
                            @slot('requirements', $job->requirements)
                            @slot('salary', $job->salary)
                            @slot('state', $job->state)
                            @slot('city', $job->city)
                            @slot('remote', $job->remote)
                            @slot('active', $job->active)
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
