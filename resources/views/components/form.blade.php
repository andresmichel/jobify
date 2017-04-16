<form id="{{ $id or '' }}" action="{{ $action or '' }}" method="{{ $method or 'POST' }}" enctype="multipart/form-data">
    {{-- @if (count($errors))
        <small class="form-text text-danger mb-5">{{ $errors->first() }}</small>
    @endif --}}

    {{ csrf_field() }}

    {{ $slot }}
</form>
