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
                                            @slot('action', url('aspirant/resume'))

                                            @component('components.file')
                                                @slot('label', '')
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
                                      @component('components.form')
                                          @slot('action', url('aspirant/profile'))

                                          @component('components.input')
                                              @slot('label', 'Nombre completo')
                                              @slot('name', 'name')
                                              {{ auth()->user()->name }}
                                          @endcomponent

                                          @component('components.input')
                                              @slot('label', 'Correo electrónico')
                                              @slot('name', 'email')
                                              @slot('type', 'email')
                                              {{ auth()->user()->email }}
                                          @endcomponent

                                          @component('components.checkbox')
                                              @slot('label', 'Mostrar fotografiía')
                                              @slot('name', 'picture')
                                              checked
                                          @endcomponent

                                          @component('components.input')
                                              @slot('label', 'Fecha de nacimiento')
                                              @slot('name', 'birth')
                                              @slot('type', 'date')
                                              {{ auth()->user()->aspirant->birth }}
                                          @endcomponent

                                          @component('components.select')
                                              @slot('label', 'Género')
                                              @slot('name', 'gender')
                                              <option {{ auth()->user()->aspirant->gender == 'M' ? 'selected' : '' }} value="M">Hombre</option>
                                              <option {{ auth()->user()->aspirant->gender == 'F' ? 'selected' : '' }} value="F">Mujer</option>
                                          @endcomponent

                                          @component('components.select')
                                              @slot('label', 'Estado')
                                              @slot('name', 'state')
                                              <option {{ auth()->user()->aspirant->state == 'Baja California' ? 'selected' : '' }} >Baja California</option>
                                          @endcomponent

                                          @component('components.input')
                                              @slot('label', 'Ciudad')
                                              @slot('name', 'city')
                                              {{ auth()->user()->aspirant->city }}
                                          @endcomponent

                                          @component('components.input')
                                              @slot('label', 'Teléfono')
                                              @slot('name', 'phone')
                                              @slot('type', 'phone')
                                              {{ auth()->user()->aspirant->phone }}
                                          @endcomponent

                                          @component('components.textarea')
                                              @slot('label', 'Descripción')
                                              @slot('name', 'description')
                                          @endcomponent

                                          @component('components.textarea')
                                              @slot('label', 'Objetivo')
                                              @slot('name', 'goal')
                                          @endcomponent

                                          @component('components.textarea')
                                              @slot('label', 'Domicilio')
                                              @slot('name', 'address')
                                          @endcomponent

                                          @component('components.textarea')
                                              @slot('label', 'Experiencia')
                                              @slot('name', 'experience')
                                              {{-- @slot('hidden', true) --}}
                                          @endcomponent

                                          @component('components.textarea')
                                              @slot('label', 'Habilidades')
                                              @slot('name', 'skills')
                                              {{-- @slot('hidden', true) --}}
                                          @endcomponent

                                          @component('components.textarea')
                                              @slot('label', 'Idiomas')
                                              @slot('name', 'laguages')
                                              {{-- @slot('hidden', true) --}}
                                          @endcomponent

                                          @component('components.button')
                                              Guardar
                                          @endcomponent
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
