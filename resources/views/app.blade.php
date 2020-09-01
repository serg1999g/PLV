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
    <main class="py-4">
        @yield('content')
    </main>
    <footer class="footer py-3 bg-white shadow">
        @include('web.layouts.footer')
    </footer>
</div>
<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
