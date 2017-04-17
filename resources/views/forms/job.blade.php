@component('components.form')
    @slot('action', $action)

    @if (isset($update) && $update)
        {{ method_field('PUT') }}
    @endif

    @component('components.input')
        @slot('label', 'Título')
        @slot('name', 'title')
        {{ $title or old('title') }}
    @endcomponent

    @if (isset($companies))
        @component('components.select')
            @slot('label', 'Empresa')
            @slot('name', 'company_id')
            @foreach ($companies as $company)
                <option value="{{ $company->id }}">{{ $company->user->name }}</option>
            @endforeach
        @endcomponent
    @endif

    @component('components.input')
        @slot('label', 'Área')
        @slot('name', 'area')
        {{ $area or old('area') }}
    @endcomponent

    @component('components.textarea')
        @slot('label', 'Descripción')
        @slot('name', 'description')
        {{ $description or old('description') }}
    @endcomponent

    @component('components.select')
        @slot('label', 'Horario')
        @slot('name', 'fulltime')
        <option {{ isset($fulltime) && $fulltime ? 'selected' : '' }} value="1">Tiempo completo</option>
        <option {{ isset($fulltime) && !$fulltime ? 'selected' : '' }} value="0">Medio tiempo</option>
    @endcomponent

    @component('components.input')
        @slot('label', 'Turno')
        @slot('name', 'shift')
        {{ $shift or old('shift') }}
    @endcomponent

    @component('components.textarea')
        @slot('label', 'Requisitos')
        @slot('name', 'requirements')
        {{ $requirements or old('requirements') }}
        {{-- @slot('hidden', true) --}}
    @endcomponent

    @component('components.input')
        @slot('label', 'Salario')
        @slot('name', 'salary')
        @slot('type', 'numeric')
        {{ $salary or old('salary') }}
    @endcomponent

    @component('components.checkbox')
        @slot('label', 'Remoto')
        @slot('name', 'remote')
        {{ isset($remote) && $remote ? 'checked' : '' }}
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

    @component('components.checkbox')
        @slot('label', 'Mostrar oferta de trabajo')
        @slot('name', 'active')
        {{ isset($active) && $active ? 'checked' : '' }}
    @endcomponent

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
