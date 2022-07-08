<x-app-layout>
    <x-slot name="header">
        <div class="bg-fixed bg-no-repeat h-screen w-screen bg-center bg-cover flex justify-center bg-blend-darken" style="background-image: url(../images/background.png">
            <div class="flex backdrop-blur-lg backdrop-opacity-30 backdrop-brightness-40 background-contrast-200 justify-center self-center absolute p-8 sm:p-2">
                <span class="font-black text-white text-center self-center">
                    <h1 class="banner text-5xl xl:text-8xl md:text-7xl">{{ __('Browse and Share Recipes') }}</h1>
                </span>
            </div> 
        </div>   
    </x-slot>     
    <section title="Recipes with rating in descending order" class="pt-1 md:pt-2 xl:pt-5 border-t-2 border-white">
       <div class="container grid m-auto xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-1 gap-x-0 gap-y-1 lg:gap-2 xl:gap-3 w-max-fit md:w-11/12 xl:w-10/12 2xl:w-8/12 ">
        @forelse ($recipes as $recipe)
            <div class="grid justify-items-center bg-white p-5 rounded-lg shadow-2xl text-slate-900 content-center">
                <div class="item self-center text-center justify-items-center flex">
                    <h2 title="Title of the recipe" aria-label="Click title for details" class="text-lg font-bold text-black text-ellipsis capitalize mr-2 lg:mr-1">
                        <a class="hover:text-red-500" href='{{ route('recipes.show', $recipe) }}'>
                            {{ $recipe->title }}
                        </a>
                   </h2> 
                </div>
                <div class="item self-center mx-4">
                    <img class="w-auto h-auto my-4" src="https://source.unsplash.com/800x500/?food-%26-drink/{{ $recipe->id }}" alt="Image of a meal."/>
                </div>
                <div class="item text-black">
                    <p>{{ __('Rating') }}: {{ $recipe->rating }}</p>
                </div> 
            </div>
        @empty
            <div class="container grid m-auto grid-cols-1 lg:grid-cols-1 lg:col-span-2 gap-x-1 w-max-fit justify-items-center  lg:w-max-fit pt-10 min-h-fit text-center bg-white">
                <div class="w-full h-80"><h1 aria-label="No content found" class="mt-28 text-3xl">{{ __("There are no published recipes") }}</h1></div>
            </div>
        @endforelse
        </div>
        <div class="flex justify-center self-center mt-5 xl:mt-10">{{ $recipes->links() }}</div>
    </section>
    <x-footer></x-footer>
</x-app-layout>
