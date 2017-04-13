@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-block">
                        @component('forms.job')
                            @slot('action', url('admn/jobs', $job->id))
                            @slot('update', true)
                            @slot('delete', true)

                            @slot('title', $job->title)
                            @slot('area', $job->area)
                            @slot('description', $job->description)
                            @slot('fulltime', $job->fulltime)
                            @slot('shift', $job->shift)
                            @slot('gender', $job->gender)
                            @slot('requirements', $job->requirements)
                            @slot('min_age', $job->min_age)
                            @slot('max_age', $job->max_age)
                            @slot('salary', $job->salary)
                            @slot('state', $job->state)
                            @slot('city', $job->city)
                            @slot('active', $job->active)
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
