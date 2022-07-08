<x-app-layout>
    <x-slot name="header">
        <div class="sr-only">
            <h1>{{ __('Details of the Recipe') }}</h1>
        </div>
    </x-slot>
    <div class="pt-12">
        @if ($recipe->ownedBy(auth()->user()))
        <div class="flex justify-evenly md:justify-end pb-5 pt-10 md:pt-14 xl:pt-14 px-0 m-auto space-x-0 md:space-x-8 lg:space-x-8 box-border md:w-10/12 lg:w-11/12 lg2:w-10/12 xl:w-10/12 2xl:w-7/12 border-1 ">
            <div>
                <a href="{{ route('recipes.edit', $recipe) }}" class="btn-link-2"><p class="self-center px-4 ml-2">{{ __('Edit') }}</p>
                    <x-edit-icon></x-edit-icon>
                </a>
            </div>
            <div>
                <form  method="POST" action="{{ route('recipes.destroy', $recipe) }}">
                @method('DELETE')
                @csrf
                <x-delete-btn></x-delete-btn>
                </form>
            </div>
        @endif
        </div>
        @if ($recipe->notOwnedBy(auth()->user()))
        <div class="flex justify-evenly md:justify-end pb-5 pt-1 xl:pt-14 px-0 m-auto space-x-0 md:space-x-8 lg:space-x-8 box-border md:w-9/12 lg:w-11/12 lg2:w-10/12 xl:w-10/12 2xl:w-7/12 border-1 ">
           
        @endif
        </div>
        <article class="grid container box-border w-max-fit min-h-screen border-1 bg-white p-10 pt-10 xl:pt-0 lg:w-11/12 lg2:w-10/12 xl:w-10/12 2xl:w-7/12 grid-cols-1 xl:grid-cols-[2fr_1fr] justify-items-center">
            <div class="grid-row-1 h-auto md:col-span-2 w-full pb-3 md:pb-0 md:pt-3 xl:pt-8 mb-0">
                <h2 class="text-2xl md:text-4xl text-center md:mt-0 md2:mt-9 xl:my-auto capitalize">
                    {{ $recipe->title }}
                </h2>
            </div>
            <div class="grid-cols-1 xl:col-span-1 xl:col-1 xl:w-auto xl:mr-16 md:mt-3 xl:mt-8">
                <img class="self-center justify-center md:scale-[0.90] md2:scale-[0.85] lg:scale-[0.9] xl:scale-[0.7]" src="https://source.unsplash.com/800x600/?food-%26-drink/{{ $recipe->id }}" alt="{{ __('Image of a meal') }}."/>
            </div>
            <div class="grid row-2 grid-cols-2 col-span-1 md:col-span-2 xl:grid-cols-1 xl:col-span-1 min-w-full pt-5 xl:pt-0 md:pt-2 md2:px-12 lg:pt-0 md:pr-8 xl:px-0 xl:mx-0 text-sm md:text-lg xl:mr-28 xl:mt-8 xl:border-2 xl:border-dotted xl:border-slate-600 xl:border-opacity-30 xl:rounded-2xl xl:h-3/5 xl:self-center ">
                <div class="self-center xl:justify-self-center md:px-6 md2:inline-flex xl:flex-col lg:px-8 md:ml-2 xl:px-0">
                    <p class="sr-only md2:not-sr-only lg:ml-24">{{ __('Preparation time') }}:</p>
                    <p class="text-start font-extrabold md2:px-2 xl:self-center">{{ $recipe->prep_time_in_min }} {{ _('minutes') }}</p> 
                </div>
                <div class="self-center justify-self-end xl:justify-self-center mr-1 md2:inline-flex xl:flex-col lg:justify-start md2:mr-5 lg:px-6 xl:mr-0 xl:ml-3">
                    <p class="sr-only md2:not-sr-only">{{ __('Rating') }}:</p>
                    <p class="font-extrabold md2:px-2 xl:self-center">{{ $recipe->rating }}</p>
                </div>
            </div>
            <div class="grid-row-3 xl:col-span-2 xl:w-auto py-5 px-0 md:px-8 md2:px-16 md2:pt-10 xl:pt-4 md:pb-10 lg:pt-8 xl:px-16 text-justify">
                <p class="text-slate-900 text-sm md:text-lg md:leading-relaxed whitespace-pre-wrap indent-8 static">{{ $recipe->body }}</p>
            </div>
            <div class="grid-row-5 grid-cols-1 col-span-1 md:grid-cols-2 md:col-span-2 text-xs md:text-base md:pb-10  min-w-full py-5 md:px-8 md2:px-16 xl:px-16 xl:py-5 xl:mt-5 text-slate-900">
                <div class="text-start sr-only">
                    <p class="opacity-70">
                        <strong>Created: </strong> 
                        {{ $recipe->created_at->diffForHumans() }}
                    </p>
                </div>
                <div class="text-start md:text-end">    
                    <p class="opacity-70">
                        <strong>Updated: </strong>{{ $recipe->updated_at->diffForHumans() }}
                    </p>
                </div>
            </div>
        </article>
    </div> 
<x-footer>
</x-footer>
</x-app-layout>
