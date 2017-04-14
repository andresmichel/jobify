@component('components.form')
    @slot('action', $action)

    @if (isset($update) && $update)
        {{ method_field('PUT') }}
    @endif

    @component('components.input')
        @slot('label', 'Nombre de la empresa')
        @slot('name', 'name')
        {{ $name or old('name') }}
    @endcomponent

    @component('components.input')
        @slot('label', 'Correo electrónico')
        @slot('name', 'email')
        @slot('type', 'email')
        {{ $email or old('email') }}
    @endcomponent

    @component('components.input')
        @slot('label', 'Contraseña')
        @slot('name', 'password')
        @slot('type', 'password')
    @endcomponent

    @component('components.input')
        @slot('label', 'Confirmar contraseña')
        @slot('name', 'password_confirmation')
        @slot('type', 'password')
    @endcomponent

    @component('components.textarea')
        @slot('label', 'Descripción')
        @slot('name', 'description')
        {{ $description or old('description') }}
    @endcomponent

    @component('components.file')
        @slot('label', 'Logotipo')
        @slot('name', 'avatar')
        {{ $avatar or old('avatar') }}
    @endcomponent

    @component('components.input')
        @slot('label', 'Sitio Web')
        @slot('name', 'website')
        {{ $website or old('website') }}
    @endcomponent

    @component('components.input')
        @slot('label', 'Categoría')
        @slot('name', 'category')
        {{ $category or old('category') }}
    @endcomponent

    @component('components.input')
        @slot('label', 'Número de empleados')
        @slot('name', 'employees')
        @slot('type', 'numeric')
        {{ $employees or old('employees') }}
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

    @component('components.textarea')
        @slot('label', 'Domicilio')
        @slot('name', 'address')
        {{ $address or old('address') }}
    @endcomponent

    @component('components.input')
        @slot('label', 'Teléfono')
        @slot('name', 'phone')
        @slot('type', 'phone')
        {{ $phone or old('phone') }}
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
