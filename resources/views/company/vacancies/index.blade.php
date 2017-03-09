@extends('layouts.master')

@section('content')
    <a href="{{ url('company/vacancies/create') }}">
        <div style="display:flex;
            width:60px; height:60px; position:fixed;
            bottom:30px; right:120px; background-color:#0275d8;
            z-index:1; border-radius:50%; align-items:center;
            justify-content:center; color:#fff; font-size:32px;
            box-shadow: 0 5px 10px rgba(0, 0, 200, 0.25);">
            <span style="display:inline-block; margin-bottom:8px;">+</span>
        </div>
    </a>

    <div class="container">
        <div class="row py-5">
            <div class="col-sm-8 offset-sm-2">
                <div class="card mb-3">
                    <ul class="list-group list-group-flush">
                        @foreach ($vacancies as $vacancy)
                            <li class="list-group-item d-block">
                                <h4 class="card-title">
                                    <a href="{{ url('company/vacancies', $vacancy->slug) }}">
                                        {{ str_limit($vacancy->title, 40) }}
                                    </a>
                                    @if (count($vacancy->applications))
                                        <span class="badge badge-success ml-2" style="font-size:1rem; font-weight:normal;">
                                            {{ count($vacancy->applications) }} Solicitantes
                                        </span>
                                    @endif
                                    <a style="font-size:1rem; font-weight:normal;" class="edit-vacancy float-right" href="{{ url('company/vacancies/'.$vacancy->slug.'/edit') }}">Editar</a>
                                </h4>
                                <p class="card-text">
                                    {{ date_format(date_create($vacancy->created_at), 'M d, Y') }} -
                                    {{ str_limit($vacancy->description, 60) }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{ $vacancies->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
