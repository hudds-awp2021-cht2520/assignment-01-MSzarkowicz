<x-app-layout>
    <x-slot name="header">
        <div role="banner" class="flex justify-left sm:ml-0 pt-28 pb-8 px-10 xl:px-20">
            <h2 class="text-xl dark:text-slate-white header">
                {{ __('New') }} {{ __('Recipe') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-0.5 md:py-20">
        <div class="m-auto md:w-3/4 xl:w-8/12 flex justify-center">
             <div class="form text-center ">
                <form  method="POST" action="{{ route('recipes.store') }}" aria-label="Add new recipe" class="text-left">
                    @csrf
                    <x-label class="mb-3" for="title"><p>Title of your new recipe:</p></x-label>
                    <x-input
                        type="text"
                        name="title"
                        field="title"
                        aria-required="true"
                        placeholder="{{ __('Title') }}"
                        class="w-full mb-6 form-text"
                        autocomplete="off"
                        :value="@old('title')"></x-input>

                    <x-label class="mb-3" for="body"><p>Type your recipe:</p></x-label>
                    <x-textarea
                        name="body"
                        rows="14"
                        field="body"
                        aria-required="true"
                        placeholder="{{ __('Your recipe') }}..."
                        class="w-full form-text"
                        :value="@old('body')"></x-textarea>
                    <div class="text-end"> 
                        <button data-message="Save your recipe" type="submit" class="mt-6 btn-link-2 btn-lg">{{ __('Save') }}</button>
                    </div>
                </form>
             </div>
        </div>
    </div>
    <x-footer></x-footer>
</x-app-layout>
