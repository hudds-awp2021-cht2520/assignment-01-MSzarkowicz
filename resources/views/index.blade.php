<x-app-layout>
    <x-slot name="header">
        <div class="bg-fixed bg-no-repeat h-screen w-screen bg-center bg-cover flex justify-center bg-blend-darken" style="background-image: url(../images/background.png">
            <div class="flex backdrop-blur-lg backdrop-opacity-30 backdrop-brightness-40 background-contrast-200 justify-center self-center absolute p-8 sm:p-2">
                <span class="font-black text-white text-center self-center">
                    <h1 class="text-5xl xl:text-8xl md:text-7xl">{{ __('Browse and Share Recipes') }}</h1>
                </span>
            </div> 
        </div>   
    </x-slot>     
    <main class="pt-1 md:pt-2 xl:pt-5 border-t-2 border-white">
       <div class="container grid m-auto xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-1 gap-x-0 gap-y-1 xl:gap-2 w-max-fit ">
        @forelse ($recipes as $recipe)
            <div class="grid justify-items-center bg-white p-5 rounded-lg shadow-2xl text-slate-900 content-center">
                <div class="item self-center text-center">
                    <h2 class="text-lg font-bold text-black text-ellipsis overflow">
                        <a href='{{ route('recipe.show', $recipe) }}'>{{ $recipe->title }}</a>
                   </h2>  
                </div>
                <div class="item self-center mx-4">
                    <img class="w-auto h-auto my-4" src="https://source.unsplash.com/800x500/?food-%26-drink/{{ $recipe->id }}" alt="Image of a meal."/>
                </div>
                <div class="item text-black">
                    <p>Rating: {{ $recipe->rating }}</p>
                </div> 
            </div>
        @empty
            <p>No published recipes</p>
        @endforelse
        </div>
        <div class="flex justify-center self-center mt-5 xl:mt-10">{{ $recipes->links() }}</div>
    </main>
    <x-footer></x-footer>
</x-app-layout>
