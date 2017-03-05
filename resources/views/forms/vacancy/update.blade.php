<form  action="{{ url('aspirant/resume') }}" method="post">
    {{ csrf_field() }}

    <div class="form-group">
        <label>Currículum</label>
        <input class="form-control" type="file" name="resume" value="{{ old('resume') }}">
    </div>

    <button class="btn btn-primary" type="submit">Guardar</button>
</form>
