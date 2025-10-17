<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome to PTC Enrollment</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Theme Checker --}}
    <script>
        if (localStorage.getItem('color-theme') === 'dark' ||
            (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    {{-- End of Theme Checker --}}
</head>

<body class="min-w-full min-h-vh p-4 bg-neutral-50 dark:bg-gray-600">
    <main class="">
        <h1 class="border border-gray-800 text-center text-gray-800 dark:text-neutral-200 text-4xl font-bold">
            Online Enrollment System in Pateros Technological College
        </h1>
    </main>

    <a href="{{ route('login') }}">
        Login
    </a>
</body>

</html>
