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
        <div class="relative flex justify-center min-h-screen:20hv py-4 items-top sm:items-center sm:pt-0">
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
            {{-- <h1 class="text-5xl">
                Recipes
            </h1> --}}

        </div>
        
            <header class="bg-white shadow">
                <div class="max-w-7xl ml-0.25 py-0.5 px-4 sm:px-6 lg:px-8">
                <h2 class="text-8xl font-semibold leading-tight text-gray-800">
                    Recipes
                </h2>
                </div>
            </header>
            <main>
                <div class="py-12">
                    <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
                        @forelse ($recipes as $recipe)
                            <div class="p-6 my-6 bg-white border-gray-200 shadow-sm sm:rounded-lg">
                                    <h2 class="text-2xl font-bold">
                                        {{ $recipe->title }}
                                    </h2>
                                    <p class="mt-2">
                                        {{ Str::limit($recipe->body, 200) }}
                                    </p>
                                    <span class="block mt-4 text-sm opacity-70">{{ $recipe->prep_time_in_min }}<p>minutes</p></span>
                            </div>
                        @empty
                        <p>No published recipes</p>
                        @endforelse
                        {{ $recipes->links() }}
                    </div>
                </div>
            </main>
    </body>
</html>
