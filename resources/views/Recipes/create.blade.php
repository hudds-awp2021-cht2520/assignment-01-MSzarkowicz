<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight dark:text-slate-white">
            {{ __('Recipes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
             <div class="p-6 my-6 dark:bg-slate-800 border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('recipes.store') }}" method="POST">
                    @csrf
                    <x-input
                        type="text"
                        name="title"
                        field="title"
                        placeholder="Title"
                        class="w-full input"
                        autocomplete="off"
                        :value="@old('title')"></x-input>
                    
                    <x-textarea
                        name="body"
                        rows="10"
                        field="body"
                        placeholder="Your recipe..."
                        class="w-full mt-6 input"
                        :value="@old('body')"></x-textarea>

                    <x-button class="mt-4">Save</x-button>
                </form>
             </div>
        </div>
    </div>
</x-app-layout>
