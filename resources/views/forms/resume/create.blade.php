@component('components.form')
    @slot('action', url('aspirant/resume'))

    {{ csrf_field() }}

    @component('components.file')
        @slot('label', 'Currículum')
        @slot('name', 'resume')
    @endcomponent

    @component('components.button')
        Guardar
    @endcomponent
@endcomponent
