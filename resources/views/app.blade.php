<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('web.layouts.head')
</head>
<body>
<div id="app">
    <header>
        @include('web.layouts.header')
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        @include('web.layouts.footer')
    </footer>
</div>
<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
