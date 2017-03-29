<div id="navbar" class="container-flud">
	<div class="container py-4">
		<div class="row">
			<div class="col-sm-12 d-flex">
				<a href="{{ url('/') }}">Jobify</a>
				@if (auth()->guest())
					<a href="{{ url('jobs') }}" class="ml-4">Ofertas de trabajo</a>
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
						@if (Auth::user()->role != 'admin')
							<a href="{{ url(Auth::user()->role.'/profile') }}" class="dropdown-item">Perfil</a>
						@endif
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
