@extends('layouts.master')

@section('content')
    <div class="container" id="resumeApp">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-block">
                        @component('components.form')
                            @slot('action', url('aspirant/profile'))
                            {{ csrf_field() }}

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

                            @component('components.input')
                                @slot('label', 'Fecha de nacimiento')
                                @slot('name', 'birth')
                                @slot('type', 'date')
                                {{ auth()->user()->aspirant->birth }}
                            @endcomponent

                            @component('components.select')
                                @slot('label', 'Género')
                                @slot('name', 'gender')
                                <option {{ auth()->user()->aspirant->gender == 'male' ? 'selected' : '' }} value="male">Hombre</option>
                                <option {{ auth()->user()->aspirant->gender == 'female' ? 'selected' : '' }} value="female">Mujer</option>
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
                                @slot('label', 'Formación académica')
                                @slot('name', 'academic_data')
                            @endcomponent

                            @component('components.textarea')
                                @slot('label', 'Formación complementaria')
                                @slot('name', 'complementary_data')
                            @endcomponent

                            <input v-for="school in education"class="form-control" type="text" name="" value="">

                            @component('components.button')
                                Guardar
                            @endcomponent
                        @endcomponent
                    </div>
                </div>
            </div>

            {{-- <div class="col-sm-12">
                <div class="card mb-5">
                    <div class="card-block">
                        @component('components.form')
                            @slot('action', url('aspirant/resume'))

                            {{ csrf_field() }}

                            @component('components.file')
                                @slot('label', 'Currículum')
                                @slot('name', 'resume')
                            @endcomponent

                            <div class="form-group">
                                @if (auth()->user()->aspirant->resume)
                                    <small class="form-text text-muted">
                                        <a href="{{ url('aspirant/resume/download') }}">
                                            {{ auth()->user()->aspirant->resume->name.'.'.auth()->user()->aspirant->resume->ext }}</small>
                                        </a>
                                @endif
                            </div>

                            @component('components.button')
                                Guardar
                            @endcomponent
                        @endcomponent
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/vue/resume.js') }}" charset="utf-8"></script>
@endsection
