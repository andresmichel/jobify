<form action="{{ $action or '' }}" method="{{ $method or 'post' }}" enctype="multipart/form-data">
    {{ $slot }}
</form>
