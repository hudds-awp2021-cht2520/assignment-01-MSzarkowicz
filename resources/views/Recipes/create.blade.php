<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-center">
            <h2 class="text-xl font-semibold leading-tight dark:text-slate-white">
                {{ __('New Recipe') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-0">
        <div class="m-auto sm:px-6 lg:px-8 sm:w-screen sm-h-screen lg:w-3/4 md:w-3/4 flex justify-center">
             <div class="p-6 dark:bg-slate-800 border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('recipes.store') }}" method="POST">
                    @csrf
                    <x-input
                        type="text"
                        name="title"
                        field="title"
                        placeholder="{{ __('Title') }}"
                        class="w-full input"
                        autocomplete="off"
                        :value="@old('title')"></x-input>
                    
                    <x-textarea
                        name="body"
                        rows="20"
                        field="body"
                        placeholder="{{ __('Your recipe') }}..."
                        class="w-full mt-6 input"
                        :value="@old('body')"></x-textarea>
                        
                    <button type="submit" class="mt-4 btn-link-2 self-center">{{ __('Save') }}</button>
                </form>
             </div>
        </div>
    </div>
</x-app-layout>
