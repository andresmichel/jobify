@extends('layouts.master')

@section('content')
    <div class="container-fixed">
        <div class="container" style="height:100vh;">
            <a href="{{ url('company/jobs/create') }}" class="fav-button" style="bottom:25px; right:15px; position:absolute">
                <i class="material-icons">add</i>
            </a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                @if (! count($jobs))
                    <div class="card">
                        <div class="card-block">
                            No tienes ofertas de trabajo.
                        </div>
                    </div>
                @else
                    <div class="card mb-5">
                        <ul class="list-group list-group-flush">
                            @foreach ($jobs as $job)
                                <li class="list-group-item d-block py-4">
                                    <div class="flex">
                                        <div class="flex flex-column w-100">
                                            <div class="flex w-100">
                                                <h5 class="card-title"><a href="{{ url('company/jobs', $job->slug) }}" class="fw-300">{{ $job->title }}</a></h5>
                                                <p class="card-subtitle mb-2 ml-auto text-nowrap">{{ $job->active ? 'Activa' : 'Oculta' }}</p>
                                            </div>
                                            <div class="flex w-100">
                                                <p class="card-subtitle mb-2">
                                                    {{ count($job->applications()
                                                            ->has('aspirant.resumeFile')
                                                            ->orHas('aspirant.resume')
                                                            ->get()) }} Solicitantes
                                                </p>
                                                <p class="card-subtitle mb-2 ml-auto flex">
                                                    <i class="material-icons mr-1 text-muted">place</i>
                                                    {{ $job->state }}, {{ $job->city }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{ $jobs->links('vendor.pagination.bootstrap-4') }}
                @endif
            </div>
        </div>
    </div>
@endsection
