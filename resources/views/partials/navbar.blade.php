<div id="navbar" class="container-flud">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 flex" style="height:72px;">
				<a href="{{ url('/') }}">Jobify</a>
				@if (auth()->guest())
					<a href="{{ url('jobs') }}" class="ml-4 {{ request()->is('jobs*') ? 'active' : '' }}">Ofertas de trabajo</a>
				@endif

				@include('partials.links')

				@if (Auth::guest())
					<a href="{{ url('login') }}" class="ml-auto {{ request()->is('login*') ? 'active' : '' }}">Inciar sesión</a>
					<a href="{{ url('register') }}" class="ml-4 btn {{ request()->is('register*') ? 'btn-primary' : 'btn-outline-primary' }}">Registrarme</a>
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
