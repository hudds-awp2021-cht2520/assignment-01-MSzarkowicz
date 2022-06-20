<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config ('app.name') }}</title>
         <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

         <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="antialiased">
        <div class="relative flex justify-center min-h-screen py-4 items-top sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="fixed top-0 right-0 hidden px-6 py-4 sm:block">
                    @auth
                        <a href="{{ route('recipes.index') }}" class="text-sm text-gray-700 underline ">Recipes</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline ">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline ">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <h1 class="text-5xl">
                Recipes
            </h1>

        </div>
    </body>
</html>
