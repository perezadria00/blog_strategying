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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased h-full">

    <div class="min-h-screen bg-gray-200 dark:bg-gray-900 flex flex-col">

    <header class="bg-gray-400 h-12">
    <nav class="flex items-center justify-between h-full p-3">
        <ul class="flex space-x-4">
            <li>
                <a href="{{ route('posts.index') }}" class="text-white text-center hover:underline hover:font-bold">Posts</a>
            </li>
        </ul>
        <div class="flex space-x-4 w-full max-w-2xl mx-auto">
   
        
        
        </div>
        <ul class="flex space-x-4 ml-auto">
            @auth
            <li>
                <a href="{{ route('profile') }}" class="text-white text-center hover:underline hover:font-bold">Profile </a>
            </li>
            <li>
                <a href="{{ route('user-posts', auth()->user()->id) }}" class="text-white text-center hover:underline hover:font-bold">Your Posts </a>
            </li>
            <li>
                <a href="" class="text-white text-center hover:underline hover:font-bold">Your Comments</a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white text-center hover:underline hover:font-bold">Log Out</button>
                </form>
            </li>
            @endauth

            @guest
            <li>
                <a href="{{ route('register') }}" class="text-white text-center hover:underline hover:font-bold">Register</a>
            </li>
            <li>
                <a href="{{ route('login') }}" class="text-white text-center hover:underline hover:font-bold">Login</a>
            </li>
            @endguest
        </ul>
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