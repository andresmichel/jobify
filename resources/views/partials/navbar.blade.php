<div class="container-flud" style="border-bottom:1px solid rgba(0,0,0,0.125); position:fixed; top:0; left:0; right:0; z-index:999; background-color:#fff;">
	<div class="container py-4">
		<div class="row">
			<div class="col-sm-12 d-flex">
				<a href="{{ url('/') }}">Jobify</a>
				@if (auth()->guest())
					<a href="{{ url('jobs') }}" class="ml-4">Vacantes</a>
				@endif

				@include('partials.links')

				@if (Auth::guest())
					<a href="{{ url('login') }}" class="ml-auto">Inciar sesión</a>
					<a href="{{ url('register') }}" class="ml-4">Registrarme</a>
				@else
					<a class="ml-auto dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						{{ Auth::user()->name }}
					</a>
					<div class="dropdown-menu dropdown-menu-right" style="margin-right:15px;" aria-labelledby="dropdownMenuLink">
						<a href="{{ url(Auth::user()->role.'/profile') }}" class="dropdown-item">Perfil</a>
						<a href="#" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar sesión</a>
					</div>

					<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				@endif
			</div>
		</div>
	</div>
</div>
