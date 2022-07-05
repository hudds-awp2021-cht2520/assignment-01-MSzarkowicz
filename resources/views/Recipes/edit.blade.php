<x-app-layout>
    <x-slot name="header">
        <div role="banner" class="flex justify-left pt-28 pb-8 px-10 xl:px-20">
            <h2 class="text-xl font-semibold leading-tight dark:text-slate-white header">
                {{ __('Edit') }} {{ __('Recipe') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-20">
        <div class="m-auto  h-auto md:w-3/4 xl:w-8/12 flex justify-center">
             <div class="form">
                <form method="POST" action="{{ route('recipes.update', $recipe) }}" title="Form" aria-label="Edit your recipe" class="mx-auto w-full">
                    @method('PATCH')
                    @csrf
                    <x-label class="mb-3" for="title"><p>Edit title of your recipe:</p></x-label>
                    <x-input
                        type="text"
                        name="title"
                        field="title"
                        aria-required="true"
                        placeholder="{{ __('Title') }}"
                        class="w-full mb-6 form-text"
                        autocomplete="off"
                        :value="@old('title', $recipe->title)"></x-input>

                    <x-label class="mb-3" for="body"><p>Edit your recipe:</p></x-label>
                    <x-textarea
                        name="body"
                        rows="14"
                        field="body"
                        aria-required="true"
                        placeholder="{{ __('Your recipe') }}..."
                        class="w-full form-text"
                        :value="@old('body', $recipe->body)"></x-textarea>
                     <div class="text-end">   
                        <button data-message="Submit updated recipe" type="submit" class="mt-6 btn-link-2 btn-lg">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
</x-app-layout>