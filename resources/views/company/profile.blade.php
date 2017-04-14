@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-block">
                        @component('forms.company')
                            @slot('action', url('company/profile'))
                            @slot('update', true)

                            @slot('name', auth()->user()->name)
                            @slot('email', auth()->user()->email)
                            @slot('description', auth()->user()->company->description)
                            @slot('avatar', auth()->user()->avatar)
                            @slot('website', auth()->user()->company->website)
                            @slot('category', auth()->user()->company->category)
                            @slot('employees', auth()->user()->company->employees)
                            @slot('state', auth()->user()->company->state)
                            @slot('city', auth()->user()->company->city)
                            @slot('address', auth()->user()->company->address)
                            @slot('phone', auth()->user()->company->phone)
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
