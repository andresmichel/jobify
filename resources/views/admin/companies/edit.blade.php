@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            @if (count($company->jobs))
                <div class="col-sm-6 offset-sm-1">
            @else
                <div class="col-sm-6 offset-sm-3">
            @endif
                <div class="card">
                    <div class="card-block">
                        @component('forms.company')
                            @slot('action', url('admin/companies', $company->id))
                            @slot('update', true)
                            @slot('delete', true)

                            @slot('name', $company->user->name)
                            @slot('email', $company->user->email)
                            @slot('description', $company->description)
                            @slot('avatar', $company->user->avatar)
                            @slot('website', $company->website)
                            @slot('category', $company->category)
                            @slot('employees', $company->employees)
                            @slot('state', $company->state)
                            @slot('city', $company->city)
                            @slot('address', $company->address)
                            @slot('phone', $company->phone)
                        @endcomponent
                    </div>
                </div>
            </div>
            @if (count($company->jobs))
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
