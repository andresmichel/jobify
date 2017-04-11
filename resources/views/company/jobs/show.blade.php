@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            @if (count($job->applications))
                <div class="col-sm-8">
            @else
                <div class="col-sm-8 offset-sm-2">
            @endif

                <div class="card mb-3">
                    <div class="card-header" style="background-color:#fff;">
                        {{ $job->title }}
                        <a class="float-right" href="{{ url('company/jobs/'.$job->slug.'/edit') }}">
                            <i class="material-icons">edit</i>
                        </a>
                    </div>
                    <div class="card-block">
                        <p class="card-text">{!! $job->description !!}</p>
                        <p class="card-text">{!! $job->description !!}</p>

                        <h5 class="card-title">Experiencia</h5>
                        <p class="card-text">{{ $job->experience }}</p>

                        <h5 class="card-title">Salario</h5>
                        <p class="card-text">{{ $job->salary }}</p>

                        <h5 class="card-title">Ubicación</h5>
                        <p class="card-text">{{ $job->state }}, {{ $job->city }}</p>
                    </div>
                </div>
            </div>

            @if (count($job->applications))
                <div class="col-sm-4">
                    <div class="card mb-3">
                        <div class="card-header" style="background-color:#fff;">
                            {{ count($job->applications) }} Solicitantes
                        </div>
                        <ul class="list-group list-group-flush" style="max-height:400px; overflow-y:auto;">
                            @foreach ($job->applications as $application)
                                <li class="list-group-item d-flex align-items-center {{ $loop->first ? 'border-top-0' : '' }}" style="flex-shrink:0;">
                                    <h6 class="card-title m-0">{{ $application->aspirant->user->name }}</h6>
                                    @if ($application->aspirant->resume)
                                        <a class="btn btn-primary btn-sm ml-auto" href="{{ url("company/jobs/$job->id/aspirant/".$application->aspirant->id) }}">
                                            Currículum
                                        </a>
                                    @else
                                        <a class="btn btn-primary btn-sm ml-auto disabled" href="#">
                                            Currículum
                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
