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
    <body class="antialiased dark:bg-slate-900 dark:text-white" >
        <header>
            <nav class="relative flex justify-center min-h-screen:20hv py-4 items-top sm:items-center sm:pt-0">
                    @if (Route::has('login'))
                    <div class="fixed top-0 right-0 hidden px-6 py-4 sm:block">
                        @auth
                            <a href="{{ route('recipes.index') }}" class="text-sm dark:text-white underline ">My Recipes</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm dark:text-white underline ">Log in</a>

                        @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm dark:text-white underline ">Register</a>
                        @endif
                        @endauth
                    </div>
                        @endif
            </nav>
        </header>
            <div class="align-center my-11">
                <h1 class="text-8xl text-center text-white">
                        Recipes
                </h1>
            </div>           
      
            <main>
                <div class="py-12">
                    <div class="mx-auto max-w-4xl sm:px-6 lg:px-8 dark:tekst-white">
                        @forelse ($recipes as $recipe)
                            <div class="p-6 my-6 dark:bg-slate-800 border-gray-200 shadow-sm sm:rounded-lg dark:text-slate-400 static">
                                <h2 class="text-lg font-bold dark:text-white ">
                                    {{ $recipe->title }}
                                </h2> 
                                <p class="mt-2 dark:text-slate-300">
                                    {{ Str::limit($recipe->body, 200) }}
                                </p>   
                                <span class="text-lg inline-grid grid-cols-3 gap-4 p-4 place-items-end"> 
                                    <span>
                                        <img class="w-auto md:w-32 my-4 lg:w-48" src="https://source.unsplash.com/360x360/?food"></img> 
                                    </span> 
                                    <span></span>
                                    <span class="self-stretch mt-20 dark:text-slate-200">
                                        <p>Rating: {{ $recipe->rating }}</p>
                                    </span>
                                </span>  
                                <span class="inline-grid grid-cols-2 gap-4 place-items-start">
                                    <span class="text-sm opacity-70 self-stretch justify-self-start">
                                        <p>Preparation time: {{ $recipe->prep_time_in_min }} minutes</p>
                                    </span>
                                <span></span>
                                </span>
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
