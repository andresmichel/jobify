@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <ul class="nav nav-tabs w-100 box-shadow mb-5" style="border:none;">
                    <li class="nav-item w-50 text-center">
                        <a class="w-100 nav-link" href="{{ url('aspirant/resume/file') }}">Subir documento</a>
                    </li>
                    <li class="nav-item w-50 text-center">
                        <a class="w-100 nav-link active" href="{{ url('aspirant/resume') }}">
                            {{ auth()->user()->aspirant->resume ? 'Editar' : 'Crear' }} currículum
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                  <div class="tab-pane active">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="card">
                                    <div class="card-block">
                                        @component('forms.resume')
                                            @slot('action', url('aspirant/resume'))

                                            @slot('name', auth()->user()->name)
                                            @slot('email', auth()->user()->email)
                                            @slot('birth', auth()->user()->aspirant->birth)
                                            @slot('gender', auth()->user()->aspirant->gender)
                                            @slot('state', auth()->user()->aspirant->state)
                                            @slot('city', auth()->user()->aspirant->city)
                                            @slot('phone', auth()->user()->aspirant->phone)

                                            @if (auth()->user()->aspirant->resume)
                                                @slot('picture', auth()->user()->aspirant->resume->picture)
                                                @slot('description', auth()->user()->aspirant->resume->description)
                                                @slot('goal', auth()->user()->aspirant->resume->goal)
                                                @slot('address', auth()->user()->aspirant->resume->address)
                                                @slot('sections', auth()->user()->aspirant->resume->sections)
                                                @slot('delete', true)
                                            @else
                                                @slot('picture', true)
                                            @endif
                                        @endcomponent
                                    </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/vue/resume.js') }}" charset="utf-8"></script>
@endsection
