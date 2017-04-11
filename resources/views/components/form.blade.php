<form action="{{ $action or '' }}" method="{{ $method or 'post' }}" enctype="multipart/form-data">
    @if (count($errors))
        {{-- <small class="form-text text-muted mb-5">{{ $errors->first() }}</small> --}}
    @endif

    {{ $slot }}
</form>
