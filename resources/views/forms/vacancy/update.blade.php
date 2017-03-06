@component('components.form')
    @slot('action', url('company/vacancies'))

    {{ csrf_field() }}
    {{ method_field('PUT') }}

    @component('components.input')
        @slot('label', 'Título')
        @slot('name', 'title')
        {{ $vacancy->title }}
    @endcomponent

    @component('components.textarea')
        @slot('label', 'Descripción')
        @slot('name', 'description')
        {{ $vacancy->description }}
    @endcomponent

    @component('components.textarea')
        @slot('label', 'Contrato')
        @slot('name', 'contract')
        {{ $vacancy->contract }}
    @endcomponent

    @component('components.select')
        @slot('label', 'Área')
        @slot('name', 'area')
        <option>A</option>
        <option>B</option>
        <option>C</option>
    @endcomponent

    @component('components.select')
        @slot('label', 'Educación')
        @slot('name', 'education')
        <option>A</option>
        <option>B</option>
        <option>C</option>
    @endcomponent

    @component('components.select')
        @slot('label', 'Turno')
        @slot('name', 'shift')
        <option>Matutino</option>
        <option>Vespertino</option>
    @endcomponent

    @component('components.select')
        @slot('label', 'Género')
        @slot('name', 'gender')
        <option value="male">Hombre</option>
        <option value="female">Mujer</option>
    @endcomponent

    @component('components.textarea')
        @slot('label', 'Experiencia')
        @slot('name', 'experience')
        {{ $vacancy->experience }}
    @endcomponent

    @component('components.input')
        @slot('label', 'Edad mínima')
        @slot('name', 'min_age')
        {{ $vacancy->min_age }}
    @endcomponent

    @component('components.input')
        @slot('label', 'Edad máxima')
        @slot('name', 'max_age')
        {{ $vacancy->max_age }}
    @endcomponent

    @component('components.input')
        @slot('label', 'Horario')
        @slot('name', 'schedule')
        {{ $vacancy->schedule }}
    @endcomponent

    @component('components.input')
        @slot('label', 'Horas a la semana')
        @slot('name', 'hours')
        {{ $vacancy->hours }}
    @endcomponent

    @component('components.input')
        @slot('label', 'Salario')
        @slot('name', 'salary')
        {{ $vacancy->salary }}
    @endcomponent

    @component('components.input')
        @slot('label', 'Idiomas')
        @slot('name', 'language')
        {{ $vacancy->language }}
    @endcomponent

    @component('components.select')
        @slot('label', 'Estado')
        @slot('name', 'state')
        <option >Baja California</option>
    @endcomponent

    @component('components.input')
        @slot('label', 'Ciudad')
        @slot('name', 'city')
        {{ $vacancy->city }}
    @endcomponent

    @component('components.select')
        @slot('label', 'Estatus')
        @slot('name', 'status')
            <option value="1">Abierto</option>
            <option value="0">Cerrado</option>
    @endcomponent

    @component('components.button')
        Guardar
    @endcomponent
@endcomponent
