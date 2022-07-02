<nav x-data="{ open: false }" class="border-b border-gray-100 bg-white text-slate-800 fixed top-0 left-0 right-0 z-20">
    <div class="px-4 mx-5 max-w-screen sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('index') }}">
                        <x-header-icon class="block w-auto lg:h-10 md:h-9 sm:h-8 text-slate-800 self-center " />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="space-x-8 sm:-my-px sm:ml-2 md:ml-16 sm:flex self-center"> 
                    <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                        {{ __('Recipes') }}
                    </x-nav-link> 
                </div>
            </div>
            <div class="hidden sm:flex sm:items-center sm:mr-6">
                <x-lang class="" align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-slate-900 transition duration-150 ease-in-out hover:text-red-500 focus:border-red-600 focus:text-red-400 ">
                            <span class="ml-2 fi fi-{{Config::get('app.languages')[App::getLocale()]['flag-icon']}}"></span>
                            <div class="ml-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                    @foreach (Config::get('app.languages') as $lang => $language)
                        @if ($lang != App::getLocale())
                            <a class="block px-4 py-2 text-sm leading-5 text-gray-700 focus:bg-gray-100 transition duration-150 ease-in-out text-center hover:bg-red-400 hover:text-white"
                                href="{{ route('lang.change', $lang) }}">
                                <span class="fi fi-{{$language['flag-icon']}} fis"></span>
                                    {{$language['display']}}
                            </a>
                        @endif
                    @endforeach
                    </x-slot>
                </x-lang>
            </div>
        </div>
             <!-- Hamburger -->
        <div class="flex items-center -mr-2 sm:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-900 transition duration-150 ease-in-out rounded-md hover:text-red-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-300 focus:red-500">
                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
            </button>
        </div>
    </div>
</nav>