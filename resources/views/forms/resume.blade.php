@component('components.form')
    @slot('action', $action)

    @if (isset($update) && $update)
        {{ method_field('PUT') }}
    @endif

    @component('components.input')
        @slot('label', 'Nombre completo')
        @slot('name', 'name')
        {{ $name or old('name') }}
    @endcomponent

    @component('components.input')
        @slot('label', 'Correo electrónico')
        @slot('name', 'email')
        @slot('type', 'email')
        {{ $email or old('email') }}
    @endcomponent

    @component('components.checkbox')
        @slot('label', 'Mostrar fotografiía')
        @slot('name', 'picture')
        {{ isset($picture) && $picture ? 'checked' : '' }}
    @endcomponent

    @component('components.input')
        @slot('label', 'Fecha de nacimiento')
        @slot('name', 'birth')
        @slot('type', 'date')
        {{ $birth or old('birth') }}
    @endcomponent

    @component('components.select')
        @slot('label', 'Género')
        @slot('name', 'gender')
        <option {{ isset($gender) && $gender == 'M' ? 'selected' : '' }} value="M">Hombre</option>
        <option {{ isset($gender) && $gender == 'F' ? 'selected' : '' }} value="F">Mujer</option>
    @endcomponent

    @component('components.input')
        @slot('label', 'Estado')
        @slot('name', 'state')
        {{ $state or old('state') }}
    @endcomponent

    @component('components.input')
        @slot('label', 'Ciudad')
        @slot('name', 'city')
        {{ $city or old('city') }}
    @endcomponent

    @component('components.input')
        @slot('label', 'Teléfono')
        @slot('name', 'phone')
        @slot('type', 'phone')
        {{ $phone or old('phone') }}
    @endcomponent

    @component('components.textarea')
        @slot('label', 'Descripción')
        @slot('name', 'description')
        {{ $description or old('description') }}
    @endcomponent

    @component('components.textarea')
        @slot('label', 'Objetivo')
        @slot('name', 'goal')
        {{ $goal or old('goal') }}
    @endcomponent

    @component('components.textarea')
        @slot('label', 'Domicilio')
        @slot('name', 'address')
        {{ $address or old('address') }}
    @endcomponent

    <div id="sectionsApp">
        <education title="Formación académica" name="education" id="education" input-id="education-input"></education>
        <education title="Experiencia laboral" name="experience" id="experience" input-id="experience-input"></education>
        <skills title="Conocimientos adicionales" name="skills" id="skills" input-id="skills-input"></skills>
        <languages title="Idiomas" name="languages" id="languages" input-id="languages-input"></languages>
    </div>

    @component('components.button')
        {{ $submit or 'Guardar' }}
    @endcomponent

    @if (isset($delete) && $delete)
        <button class="btn btn-danger" form="delete" type="submit">Eliminar</button>
    @endif
@endcomponent

@if (isset($delete) && $delete)
    <form id="delete" action="{{ $action }}" method="post" hidden>
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>
@endif
