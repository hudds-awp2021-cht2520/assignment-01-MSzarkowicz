<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Recipes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @forelse ($recipes as $recipe)
                <div class="p-6 my-6 bg-white border-gray-200 shadow-sm sm:rounded-lg">
                        <h2 class="text-2xl font-bold">
                            {{ $recipe->title }}
                        </h2>
                        <p class="mt-2">
                            {{ Str::limit($recipe->body, 200) }}
                        </p>
                        <span class="block mt-4 text-sm opacity-70">{{ $recipe->updated_at->diffForHumans() }}</span>
                    </div>
            @empty
            <p>No published recipes</p>
            @endforelse
            {{ $recipes->links() }}
        </div>
    </div>
</x-app-layout>
