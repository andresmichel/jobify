{{-- {{ dd($resume) }} --}}
@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-block">
                        @if ($resume->picture)
                            <div class="form-group">
                                <img style="max-width:140px; max-height:140px;" src="{{ asset($resume->aspirant->user->avatar) }}">
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="name">Nombre completo</label>
                            <input readonly class="form-control" value="{{ $resume->aspirant->user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input readonly class="form-control" value="{{ $resume->aspirant->user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="birth">Fecha de nacimiento</label>
                            <input readonly class="form-control" value="{{ $resume->aspirant->birth }}">
                        </div>
                        <div class="form-group">
                            <label for="gender">Género</label>
                            <input readonly class="form-control" value="{{ $resume->aspirant->gender == 'M' ? 'Hombre' : 'Mujer' }}">
                        </div>
                        <div class="form-group">
                            <label for="state">Estado</label>
                            <input readonly class="form-control" value="{{ $resume->aspirant->state }}">
                        </div>
                        <div class="form-group">
                            <label for="city">Ciudad</label>
                            <input readonly class="form-control" value="{{ $resume->aspirant->city }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Teléfono</label>
                            <input readonly class="form-control" value="{{ $resume->aspirant->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <input readonly class="form-control" value="{{ $resume->description }}">
                        </div>
                        <div class="form-group">
                            <label for="goal">Objetivo</label>
                            <input readonly class="form-control" value="{{ $resume->goal }}">
                        </div>
                        <div class="form-group">
                            <label for="address">Domicilio</label>
                            <input readonly class="form-control" value="{{ $resume->address }}">
                        </div>
                        <div id="sectionsApp">
                            <education readonly title="Formación académica" name="education" id="education" input-id="education-input"></education>
                            <experience readonly title="Experiencia laboral" name="experience" id="experience" input-id="experience-input"></experience>
                            <skills readonly title="Conocimientos adicionales" name="skills" id="skills" input-id="skills-input"></skills>
                            <languages readonly title="Idiomas" name="languages" id="languages" input-id="languages-input"></languages>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('vue.sections', [
        'resume' => $resume
    ])
@endsection
