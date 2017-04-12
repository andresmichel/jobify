<!DOCTYPE html>
<html>
    <head>
        @include('partials.head')
    </head>
    <body style="margin-top:72px;">
        @include('partials.navbar')

        <div class="main-container @yield('padding', 'py-5')"
            style="min-height:calc(100vh - 130px);">
            @yield('header')
            @yield('content')
        </div>

        @include('partials.footer')

        @include('partials.scripts')

        @yield('scripts')
    </body>
</html>
