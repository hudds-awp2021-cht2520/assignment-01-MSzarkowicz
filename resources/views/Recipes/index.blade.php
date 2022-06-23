<x-app-layout>
    <x-slot name="header">
        <div>
            <h2>
                {{ __('My Recipes') }} 
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <a href="{{ route('recipes.create') }}" class="btn-link-2 mb-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
              </svg>
            <p class="self-center ml-2">New Recipe</p></a>
        @forelse ($recipes as $recipe)
            <div class="grid grid-rows-3 grid-flow-col gap-4 p-6 my-6 dark:bg-slate-800 border-gray-200 shadow-sm sm:rounded-lg">
                <div class="row-span-3">
                    <img class="w-auto h-auto md:w-32 my-4 lg:w-48" src="https://source.unsplash.com/600x600/?food-%26-drink/{{ $recipe->id }}"/>
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
