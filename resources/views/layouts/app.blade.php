<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Laravel')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased h-full">
    <div class="min-h-screen bg-gray-200 dark:bg-gray-900 flex flex-col">

        <!-- Header -->
        <header class="bg-gray-400 h-12">
            <nav>
              <li>
          
              </li>

            </nav>
        </header>

        <!-- Main Content -->
        <main class="bg-gray-200 flex-1">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gray-500">
            <p class="text-center text-white">FOOTER</p>
        </footer>

    </div>
    @livewireScripts
</body>

</html>