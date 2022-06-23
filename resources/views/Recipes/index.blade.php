<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight dark:text-white">
            {{ __('My Recipes') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <a href="{{ route('recipes.create') }}" class="btn-link btn-lg mb-2">+ Recipe</a>
        @forelse ($recipes as $recipe)
            <div class="grid grid-rows-3 grid-flow-col gap-4 p-6 my-6 dark:bg-slate-800 border-gray-200 shadow-sm sm:rounded-lg">
                <div class="row-span-3">
                    <img class="w-auto h-auto md:w-32 my-4 lg:w-48" src="https://source.unsplash.com/600x600/?food"></img>
                </div>
                <div class="col-span-3 ">
                    <h2 class="text-2xl font-bold">
                        <a href='{{ route('recipes.show', $recipe) }}'>{{ $recipe->title }}</a>
                    </h2>
                    <span class="block mt-4 text-sm opacity-70">{{ $recipe->updated_at->diffForHumans() }}</span>
                </div>
               
                <div class="row-span-2 col-span-2">
                    <p class="dark:text-slate-300 static">
                        {{ Str::limit($recipe->body, 250) }}
                    </p>
                    
                </div>
            </div>
        @empty
            <p>No published recipes</p>
        @endforelse
           {{ $recipes->links() }}
        </div>
    </div>
</x-app-layout>
