<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight dark:text-white">
            {{ __('My Recipe') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-rows-3 grid-flow-col gap-4 p-6 my-6 dark:bg-slate-800 border-gray-200 shadow-sm sm:rounded-lg">
                <div class="row-span-3">
                    <img class="w-auto h-auto md:w-32 my-4 lg:w-48 float-left" src="https://source.unsplash.com/600x1100/?food"></img>
                </div>
                <div class="col-span-3 ">
                    <h2 class="text-4xl font-bold">
                        {{ $recipe->title }}
                    </h2>
                    <p>
                        Rating: {{ $recipe->rating }}
                    </p>
                    <span class="text-sm opacity-70 self-stretch justify-self-end">
                        <p>Preparation time: {{ $recipe->prep_time_in_min }} minutes</p>
                    </span>
                </div>
                <div class="row-span-2 col-span-2">
                    <p class="dark:text-slate-300 static whitespace-pre-wrap mt-4">{{ $recipe->body }}</p>
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
