<!DOCTYPE html>
<html>
    <head>
        @include('partials.head')
    </head>
    <body style="margin-top:72px;">
        @include('partials.navbar')

        <div class="main-container" style="min-height:calc(100vh - 130px);">
            @yield('content')
        </div>

        @include('partials.footer')

        @include('partials.scripts')

        @yield('scripts')
    </body>
</html>
