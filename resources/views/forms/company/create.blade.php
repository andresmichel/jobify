<form  action="{{ url('register/company') }}" method="post">
    {{ csrf_field() }}

    <div class="form-group">
        <label>Nombre de la empresa</label>
        <input class="form-control" type="text" name="name" value="{{ old('name') }}">
    </div>

    <div class="form-group">
        <label>Correo electrónico</label>
        <input class="form-control" type="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="form-group">
        <label>Contraseña</label>
        <input class="form-control" type="password" name="password">
    </div>

    <div class="form-group">
        <label>Confirmar contraseña</label>
        <input class="form-control" type="password" name="password_confirmation">
    </div>

    <div class="form-group">
        <label>Descripción</label>
        <textarea class="form-control" name="description" rows="8" cols="80">{{ old('description') }}</textarea>
    </div>

    <div class="form-group">
        <label>Logo</label>
        <input class="form-control" type="file" name="logo" value="">
    </div>

    <div class="form-group">
        <label>Sitio Web</label>
        <input class="form-control" type="text" name="website" value="{{ old('website') }}">
    </div>

    <div class="form-group">
        <label>Categoría</label>
        <input class="form-control" type="text" name="category" value="{{ old('category') }}">
    </div>

    <div class="form-group">
        <label>Número de empleados</label>
        <input class="form-control" type="text" name="employees" value="{{ old('employees') }}">
    </div>

    <div class="form-group">
        <label>Estado</label>
        <input class="form-control" type="text" name="state" value="{{ old('state') }}">
    </div>

    <div class="form-group">
        <label>Ciudad</label>
        <input class="form-control" type="text" name="city" value="{{ old('city') }}">
    </div>

    <div class="form-group">
        <label>Domicilio</label>
        <textarea class="form-control" name="address" rows="8" cols="80">{{ old('address') }}</textarea>
    </div>

    <div class="form-group">
        <label>Teléfono</label>
        <input class="form-control" type="text" name="phone" value="{{ old('phone') }}">
    </div>

    <button class="btn btn-primary" type="submit">Registrarme</button>
</form>
