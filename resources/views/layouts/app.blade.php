<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DevStagram - @yield('title')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b font-black">
            <div
                class="container mx-auto flex
                justify-between items-center">
                <h1 class="text-3xl font-black">DevStagram</h1>
                {{-- para cuando esta autetniticado se muestra --}}
                @auth
                    <nav class="gap-2 items-center">
                        <a href="{{ route('login') }}" class="font-bold uppercase text-gray-600 text-sm ">
                            Hola:
                            <span class="font-normal">
                                {{ auth()->user()->username }}
                            </span>
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button  class="font-bold uppercase text-gray-600 text-sm ">
                                Cerrar sesión
                            </button>
                        </form>
                    </nav>
                @endauth

                {{-- para cuando no esta autetniticado se muestra --}}
                @guest
                    <nav class="gap-2 items-center">
                        <a href="{{ route('login') }}" class="font-bold uppercase text-gray-600 text-sm ">Login</a>
                        <a href="{{ route('register') }}" class="font-bold uppercase text-gray-600 text-sm ">
                            Crear Cuenta
                        </a>
                    </nav>
                @endguest
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('title')
            </h2>
            @yield('content')
        </main>

        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            DevStagram - Todos los derechos reservados
            {{ now()->year}}
        </footer>
    </body>
</html>

