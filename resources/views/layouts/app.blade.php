<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timberhub - @yield('title')</title>
    @yield('css')
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex flex-col h-screen justify-between">
        @include('partials.navbar')
        <div class="mb-auto">
            @if (session()->has('message'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <span class="font-medium">{{ session('message') }}</span>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            @endif
            @yield('content')
        </div>
        @include('partials.footer')
    </div>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    @yield('scripts')
</body>

</html>
