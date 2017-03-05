@component('components.form')
    @slot('action', url('company/vacancies'))

    {{ csrf_field() }}

    @component('components.input')
        @slot('label', 'Título')
        @slot('name', 'title')
    @endcomponent

    @component('components.textarea')
        @slot('label', 'Descripción')
        @slot('name', 'description')
    @endcomponent

    @component('components.textarea')
        @slot('label', 'Contrato')
        @slot('name', 'contract')
    @endcomponent

    @component('components.select')
        @slot('label', 'Área')
        @slot('name', 'area')
    @endcomponent

    @component('components.select')
        @slot('label', 'Educación')
        @slot('name', 'education')
    @endcomponent

    @component('components.select')
        @slot('label', 'Turno')
        @slot('name', 'shift')
    @endcomponent

    @component('components.select')
        @slot('label', 'Género')
        @slot('name', 'gender')
    @endcomponent

    @component('components.textarea')
        @slot('label', 'Experiencia')
        @slot('name', 'experience')
    @endcomponent

    @component('components.input')
        @slot('label', 'Edad mínima')
        @slot('name', 'min_age')
    @endcomponent

    @component('components.input')
        @slot('label', 'Edad máxima')
        @slot('name', 'max_age')
    @endcomponent

    @component('components.input')
        @slot('label', 'Horario')
        @slot('name', 'schedule')
    @endcomponent

    @component('components.input')
        @slot('label', 'Horas a la semana')
        @slot('name', 'hours')
    @endcomponent

    @component('components.input')
        @slot('label', 'Salario')
        @slot('name', 'salary')
    @endcomponent

    @component('components.input')
        @slot('label', 'Idiomas')
        @slot('name', 'language')
    @endcomponent

    @component('components.select')
        @slot('label', 'Estado')
        @slot('name', 'state')
        <option >Baja California</option>
    @endcomponent

    @component('components.input')
        @slot('label', 'Ciudad')
        @slot('name', 'city')
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
