<x-app-layout>
    <x-slot name="header">
        <div role="banner" class="pt-28 pb-8 px-10 xl:px-20 header">
            <h1>
                {{ __('My') }} {{ __('Recipes') }}
            </h1>
        </div>
    </x-slot>
        <div role="none" class="py-6">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <secion class="mx-auto max-w-7xl sm:px-6 lg:px-8 w-auto">
                <div class="flex justify-center md:justify-end xl:w-10/12 mt-5 md:mt-2 md:mr-10 xl:pr-0">
                    <a aria-label="add new" href="{{ route('recipes.create') }}" class="btn-link-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" role="img" aria-label="plus icon">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        <p aria-label="Add new recipe" class="self-center ml-2">{{ __('New') }} {{ __('Recipe') }}</p>
                    </a>
                </div>
                <div class="container grid m-auto lg:grid-cols-2 grid-cols-1 gap-x-1 gap-y-1 xl:gap-2 w-max-fit justify-items-stretch md:w-11/12 lg:w-max-fit xl:w-8/12 pt-10 min-h-fit ">
                @forelse ($recipes as $recipe)
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-2 p-6 bg-white border-gray-200 shadow-sm sm:rounded-lg md:px-10 m-auto">
                        <div class="col-span-1 grid-row-1 lg:col-span-3 justify-items-center">
                            <div class="flex justify-items-center align-middle">
                                <h2 aria-label="Title of the recipe" class="text-2xl font-bold text-center m-auto pt-4">
                                    <a aria-label="Click to see the to details" class="hover:text-red-500" href='{{ route('recipes.show', $recipe) }}'>{{ $recipe->title }}</a>
                                </h2>
                            </div>
                        </div>
                        <div class="grid-row-2 justify-items-center m-auto">
                            <img class="scale-[0.8] md:scale-90 lg:scale-110 pt-2 lg:pt-10 xl:pt-5 md:mx-0 " src="https://source.unsplash.com/600x600/?food-%26-drink/{{ $recipe->id }}" alt="{{ __('Image of a meal') }}."/>
                        </div>
                        <div class="grid-row-3 lg:col-span-2 col-span-1 m-auto px-4 pb-6 pt-2 lg:pt-6 xl:mt-4 lg:ml-5 text-justify justify-items-center">
                            <p aria-label="Excerpt of the recipe" class="text-slate-900 text-justify">
                                {{ Str::limit($recipe->body, 100) }}
                            </p>
                        </div>
                        <div class="row-4 col-span-1 lg:col-span-3 mt-4 text-sm opacity-70 justify-self-end">{{ $recipe->updated_at->diffForHumans() }}</div>
                    </div>    
                @empty
                    <div class="container grid m-auto grid-cols-1 lg:grid-cols-1 lg:col-span-2 gap-x-1 w-max-fit justify-items-center  lg:w-max-fit pt-10 min-h-fit text-center bg-white">
                        <div class="w-full h-80"><h1 aria-label="No content found" class="mt-28 text-3xl">{{ __("You haven't saved any recipes yet") }}</h1></div>
                    </div>
                @endforelse
                </div>
                <div class="flex justify-center self-center mt-5 xl:mt-10">{{ $recipes->links() }}</div>
            </secion>
        </div>
        <x-footer></x-footer>
</x-app-layout>
