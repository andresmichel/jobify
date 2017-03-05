<form action="{{ url('aspirant/profile') }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="form-group">
        <label>Foto</label>
        <input class="form-control" type="file" name="picture">
    </div>

    <div class="form-group">
        <label>Nombre completo</label>
        <input class="form-control" type="text" name="name" value="">
    </div>

    <div class="form-group">
        <label>Correo electrónico</label>
        <input class="form-control" type="email" name="email" value="">
    </div>

    <div class="form-group">
        <label>Contraseña</label>
        <input class="form-control" type="password" name="password" value="">
    </div>

    <div class="form-group">
        <label>Confirmar contraseña</label>
        <input class="form-control" type="password" name="password_confirmation" value="">
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
        <input class="form-control" type="text" name="state" value="">
    </div>

    <div class="form-group">
        <label>Ciudad</label>
        <input class="form-control" type="text" name="city" value="">
    </div>

    <div class="form-group">
        <label>Teléfono</label>
        <input class="form-control" type="text" name="phone" value="">
    </div>

    <button class="btn btn-primary" type="submit">Guardar cambios</button>
</form>
