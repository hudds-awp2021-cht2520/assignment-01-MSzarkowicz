<nav aria-labelledby="primary-navigation" x-data="{ open: false }" class="border-b border-gray-100 bg-white text-slate-800 fixed top-0 left-0 right-0 z-20">
    <div role="none" class="flex h-16 justify-between">
        <div class="flex lg:px-6" role="menu" aria-orientation="horizontal" aria-haspopup="false" aria-label="Navigate to homepage">
            <!-- Logo -->
            <div role="menuitem" class="space-x-2 flex items-center shrink-0">
                <x-nav-link role="button" aria-label="link" :href="route('index')" :active="request()->routeIs('index')">
                    <x-header-icon aria-label="Recipes logo" role="img" title="Image of a cake" class=" mb-2 block w-auto lg:h-9 md:h-9 h-8 text-slate-800 self-center mr-6 " /><h2 class="text-2xl logo-font"> {{ __('Recipes') }}</h2>
                </x-nav-link> 
            </div>
            </div>
           <!-- set language -->
            <div class="sm:flex sm:items-center sm:mr-6 mt-5">
                <x-lang align="right" width="48" role="none">
                    <x-slot name="trigger"  role="menu" aria-orientation="horizontal" tabindex="0" aria-controls="lang" aria-label="menu-item">
                        <button aria-label="Switch Language" aria-expanded="false" aria-pressed="false" aria-haspopup="menu" id="lang" class="flex items-center text-md font-medium text-slate-900 transition duration-150 ease-in-out hover:text-red-500 focus:border-red-600 focus:text-red-400 ">
                            <span aria-label="Current Language" class="sr-only" >{{ Config::get('app.languages')[App::getLocale()]['display'] }}</span>
                            <span aria-label="Flag icon" class="ml-1 fi fi-{{Config::get('app.languages')[App::getLocale()]['flag-icon']}}"></span>
                            <div class="ml-1">
                                <svg aria-label="Arrow down" class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content" role="group">
                    @foreach (Config::get('app.languages') as $lang => $language)
                        @if ($lang != App::getLocale())
                            <a role="menuitem" class="block px-2 py-2 text-sm leading-5 text-gray-700 focus:bg-gray-100 transition duration-150 ease-in-out text-center hover:bg-red-400 hover:text-white"
                                href="{{ route('lang.change', $lang) }}">
                                <span class="fi fi-{{$language['flag-icon']}}"></span>
                                    {{$language['display']}}
                            </a>
                        @endif
                    @endforeach
                    </x-slot>
                </x-lang>            
            </div>
        </div>
    </div>
</nav>