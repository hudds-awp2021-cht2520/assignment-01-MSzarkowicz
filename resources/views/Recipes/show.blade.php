<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('My Recipe') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-end w-100">
                <div class="mr-5">
                    <a href="{{ route('recipes.edit', $recipe) }}" class="btn-link-2"><p class="self-center px-4">Edit</p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg> 
                    </a>
                </div>
                <div class="ml-5">
                    <form action="{{ route('recipes.destroy', $recipe) }}" method="post">
                    @method('DELETE')
                    @csrf
                        <button type="submit" class="btn-link-2 mr-1 hover:border-red-600" onclick="return confirm('Are you sure you want to permanently delete this recipe?')"><p class="self-center mr-2 ml-1">Delete</p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                             </svg>
                        </button>
                    </form>
                </div>
            </div>
            <div class="grid grid-rows-3 grid-flow-col gap-4 py-20 px-10 my-6 dark:bg-slate-800 border-gray-200 shadow-sm sm:rounded-lg">
                <div class="row-span-3">
                    <img class="w-auto h-auto md:w-32 my-4 lg:w-48 float-left pl-5" src="https://source.unsplash.com/600x1150/?food-%26-drink/{{ $recipe->id }}"/>
                </div>
                <div class="col-span-3 px-10">
                    <h2 class="text-4xl font-bold self-center">
                        {{ $recipe->title }}
                    </h2>
                    <p>
                        Rating: {{ $recipe->rating }}
                    </p>
                    <span class="text-sm opacity-70 mb-0">
                        <p>Preparation time: {{ $recipe->prep_time_in_min }} minutes</p>
                    </span>
                </div>
                <div class="row-span-2 col-span-2">
                    <p class="dark:text-slate-300 static whitespace-pre-wrap mt-0 px-10">{{ $recipe->body }}</p>
                </div>
            </div>
            <div class="flex mt-4 text-sm opacity-70">
                <p class="opacity-60">
                    <strong>Created:</strong> {{ $recipe->created_at->diffForHumans() }}</p>
                <p class="ml-10 opacity-60">
                    <strong>Updated:</strong> {{ $recipe->updated_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
