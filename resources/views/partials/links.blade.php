@if (auth()->check())
    @if (auth()->user()->role == 'admin')

    @elseif (auth()->user()->role == 'aspirant')
        <a href="{{ url('aspirant/resume') }}" class="ml-4">Currículum</a>
        <a href="{{ url('vacancies') }}" class="ml-4">Vacantes</a>
        <a href="{{ url('aspirant/applications') }}" class="ml-4">Solicitudes</a>
    @elseif (auth()->user()->role == 'company')
        <a href="{{ url('company/vacancies') }}" class="ml-4">Vacantes</a>
    @endif
@endif
