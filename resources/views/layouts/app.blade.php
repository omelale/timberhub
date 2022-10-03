<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timberhub - @yield('title')</title>
    @vite('resources/css/app.css')
</head>

<body>
    <h1 class="text-3xl font-bold underline">
        Hello world!
        @yield('content')
    </h1>
    @include('partials.footer')
</body>

</html>
