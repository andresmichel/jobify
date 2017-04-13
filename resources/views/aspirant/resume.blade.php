@extends('layouts.master')

@section('content')
    <div class="container" id="resumeApp">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <ul class="nav nav-tabs w-100 box-shadow mb-5" role="tablist" style="border:none;">
                    <li class="nav-item w-50 text-center">
                        <a class="w-100 nav-link active" data-toggle="tab" href="#f" role="tab">Subir archivo</a>
                    </li>
                    <li class="nav-item w-50 text-center">
                        <a class="w-100 nav-link" data-toggle="tab" href="#r" role="tab">Crear currículum</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="f" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card mb-5">
                                    <div class="card-block">
                                        @component('components.form')
                                            @slot('action', url('aspirant/resume-file'))

                                            @component('components.file')
                                                @slot('name', 'resume')
                                            @endcomponent

                                            <div class="form-group">
                                                @if (auth()->user()->aspirant->resumeFile)
                                                    <small class="form-text text-muted">
                                                        <a href="{{ url('aspirant/resume/download') }}">
                                                            {{ auth()->user()->aspirant->resumeFile->name.'.'.auth()->user()->aspirant->resumeFile->ext }}
                                                        </a>
                                                    </small>
                                                @endif
                                            </div>

                                            @component('components.button')
                                                Guardar
                                            @endcomponent
                                        @endcomponent
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <div class="tab-pane" id="r" role="tabpanel">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="card">
                                    <div class="card-block">
                                        @component('forms.aspirant')
                                            @slot('action', url('aspirant/resume'))
                                            
                                            @slot('name', auth()->user()->name)
                                            @slot('email', auth()->user()->email)
                                            @slot('picture', true)
                                            @slot('birth', auth()->user()->aspirant->birth)
                                            @slot('gender', auth()->user()->aspirant->gender)
                                            @slot('state', auth()->user()->aspirant->state)
                                            @slot('city', auth()->user()->aspirant->city)
                                            @slot('phone', auth()->user()->aspirant->phone)
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
