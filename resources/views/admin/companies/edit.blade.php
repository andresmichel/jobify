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
                            @slot('website', $company->website)
                            @slot('category', $company->category)
                            @slot('employees', $company->employees)
                            @slot('state', $company->state)
                            @slot('city', $company->city)
                            @slot('address', $company->address)
                            @slot('phone', $company->phone)

                            @if ($company->user->avatar)
                                @slot('avatar', 'Ver logotipo')
                                @slot('avatar_url', asset($company->user->avatar))
                            @endif
                        @endcomponent
                    </div>
                </div>
            </div>
            @if (count($company->jobs))
                <div class="col-sm-4">
                    <h3 class="mb-4">Ofertas de trabajo</h3>
                    <div class="card">
                        <ul class="list-group list-group-flush" style="max-height:600px;">
                            @foreach ($company->jobs as $job)
                                <li class="list-group-item flex flex-nowrap flex-noshrink {{ $loop->first ? 'border-top-0' : '' }}">
                                    <span class="text-truncate mr-auto">
                                        {{ $job->title }}
                                    </span>

                                    <form id="deleteJob" action="{{ url('admin/jobs', $job->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <button form="deleteJob" type="submit" style="background-color:inherit;">
                                        <i class="material-icons text-danger">delete</i>
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
