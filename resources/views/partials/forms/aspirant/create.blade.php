<form action="{{ url('register/aspirant') }}" method="post">
    {{ csrf_field() }}

    <div class="form-group">
        <label>Foto</label>
        <input class="form-control" type="file" name="picture">
    </div>

    <div class="form-group">
        <label>Nombre completo</label>
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
        <label>Género</label>
        <select class="form-control" name="gender">
            <option value="male">Hombre</option>
            <option value="female">Mujer</option>
        </select>
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
        <label>Teléfono</label>
        <input class="form-control" type="text" name="phone" value="{{ old('phone') }}">
    </div>

    <button class="btn btn-primary" type="submit">Registrarme</button>
</form>
