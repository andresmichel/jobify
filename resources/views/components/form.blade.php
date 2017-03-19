<form action="{{ $action or '' }}" method="{{ $method or 'post' }}" enctype="multipart/form-data">
    @if (count($errors))
        {{-- <small class="form-text text-muted mb-3">{{ $errors->first() }}</small> --}}
    @endif

    {{ $slot }}
</form>
