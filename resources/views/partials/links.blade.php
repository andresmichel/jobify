@if (auth()->check())
    @if (auth()->user()->role == 'admin')
        @if (!request()->is('admin'))
            <a href="{{ url('admin/aspirants') }}" class="ml-4 {{ request()->is('admin/aspirants') ? 'active' : '' }}">Aspirantes</a>
            <a href="{{ url('admin/companies') }}" class="ml-4 {{ request()->is('admin/companies') ? 'active' : '' }}">Empresas</a>
        @endif
    @elseif (auth()->user()->role == 'aspirant')
        <a href="{{ url('aspirant/resume') }}" class="ml-4 {{ request()->is('aspirant/resume') ? 'active' : '' }}">Currículum</a>
        <a href="{{ url('jobs') }}" class="ml-4 {{ request()->is('jobs') ? 'active' : '' }}">Ofertas de trabajo</a>
        <a href="{{ url('aspirant/applications') }}" class="ml-4 {{ request()->is('aspirant/applications') ? 'active' : '' }}">Solicitudes</a>
    @elseif (auth()->user()->role == 'company')
        <a href="{{ url('company/jobs') }}" class="ml-4 {{ request()->is('company/jobs') ? 'active' : '' }}">Ofertas de trabajo</a>
    @endif
@endif
