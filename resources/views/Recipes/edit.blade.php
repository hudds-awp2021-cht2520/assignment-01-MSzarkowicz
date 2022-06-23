<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-center">
            <h2 class="text-xl font-semibold leading-tight dark:text-slate-white">
                {{ __('Edit Recipe') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-0">
        <div class="m-auto sm:px-6 lg:px-8 sm:w-screen sm-h-screen lg:w-3/4 md:w-3/4 flex justify-center">
             <div class="p-6 dark:bg-slate-800 border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('recipes.update', $recipe) }}" method="post">
                    @method('PUT')
                    @csrf
                    <x-input
                        type="text"
                        name="title"
                        field="title"
                        placeholder="Title"
                        class="w-full input"
                        autocomplete="off"
                        :value="@old('title', $recipe->title)"></x-input>
                    
                    <x-textarea
                        name="body"
                        rows="20"
                        field="body"
                        placeholder="Your recipe..."
                        class="w-full mt-6 input"
                        :value="@old('body', $recipe->body)"></x-textarea>
                        
                    <button type="submit" class="mt-4 btn-link-2 self-center">Update</button>
                </form>
             </div>
        </div>
    </div>
</x-app-layout>