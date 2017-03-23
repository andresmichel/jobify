@if (auth()->check())
    @if (auth()->user()->role == 'admin')
        @if (!request()->is('admin'))
            <a href="{{ url('admin/aspirants') }}" class="ml-4">Aspirantes</a>
            <a href="{{ url('admin/companies') }}" class="ml-4">Empresas</a>
        @endif
    @elseif (auth()->user()->role == 'aspirant')
        <a href="{{ url('aspirant/resume') }}" class="ml-4">Currículum</a>
        <a href="{{ url('jobs') }}" class="ml-4">Ofertas de trabajo</a>
        <a href="{{ url('aspirant/applications') }}" class="ml-4">Solicitudes</a>
    @elseif (auth()->user()->role == 'company')
        <a href="{{ url('company/jobs') }}" class="ml-4">Ofertas de trabajo</a>
    @endif
@endif
