@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-block">
                        @component('forms.aspirant')
                            @slot('action', url('aspirant/profile'))
                            @slot('update', true)

                            @slot('name', auth()->user()->name)
                            @slot('email', auth()->user()->email)
                            @slot('birth', auth()->user()->aspirant->birth)
                            @slot('gender', auth()->user()->aspirant->gender)
                            @slot('state', auth()->user()->aspirant->state)
                            @slot('city', auth()->user()->aspirant->city)
                            @slot('phone', auth()->user()->aspirant->phone)

                            @if (auth()->user()->avatar)
                                @slot('avatar', 'Ver foto de perfil')
                                @slot('avatar_url', asset(auth()->user()->avatar))
                            @endif
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
