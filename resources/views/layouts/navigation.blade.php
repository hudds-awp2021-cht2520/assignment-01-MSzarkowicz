<nav x-data="{ open: false }" class="border-b border-gray-100 bg-white text-slate-800 fixed top-0 left-0 right-0 z-20">
    @if (Route::has('login'))
    @auth
    @else
        <a href="{{ route('login') }}" class="text-sm text-slate-800 underline ">{{ __('Log in') }}</a>
    @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 text-sm text-slate-800 underline ">{{ __('Register') }}</a>
    @endif
    @endauth
   
    @endif
    <!-- Primary Navigation Menu -->
    <div aria-label="primary-navigation" role="menubar" tabindex="0" class="px-2 mx-2 py-1 md:py-2 md:mx-5 max-w-screen md:px-0">
        <div role="none" class="flex h-16 justify-between">
            <div class="flex px-0 md:px-6" role="menu" aria-orientation="horizontal" aria-haspopup="false" aria-label="Navigate to homepage">
                <!-- Logo -->
                <div role="menuitem" class="space-x-2 flex items-center shrink-0 sm:-my-px">
                    <x-nav-link role="button" aria-label="link" :href="route('index')" :active="request()->routeIs('index')">
                        <x-header-icon aria-label="Recipes logo" role="img" title="Image of a cake" class=" mb-2 block w-auto lg:h-9 md:h-9 h-8 text-slate-800 self-center mr-2 lg:mr-6"/><h2 class="text-lg md:text-2xl logo-font"> {{ __('Recipes') }}</h2>
                    </x-nav-link> 
                </div>
            </div>
            <!-- Settings Dropdown -->
            <div role="none" class="hidden sm:flex sm:items-center sm:m-6">
                    <x-dropdown align="right" width="48" role="none">
                        <x-slot name="trigger" role="menu" aria-orientation="horizontal" aria-controls="user">
                            <button aria-label="User's menu" aria-haspopup="menu" aria-pressed="false" aria-expanded="false" id="user" class="mr-6 flex items-center text-md font-medium text-slate-900 transition duration-150 ease-in-out hover:text-red-500 focus:border-red-600 focus:text-red-400 ">
                                <div aria-label="Name of currently logged in user">{{ Auth::user()->name }}</div>
                                <div class="ml-1" role="none">
                                    <svg aria-label="Arrow down" role="img" class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content" role="group">
                            <x-dropdown-link aria-label="Go to dashboard" role="menuitem" aria-hidden="true" :href="route('recipes.index')">{{ __('My') }} {{ __('Recipes') }}</x-dropdown-link>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link  role="menuitem" aria-hidden="true" 
                                        :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                  <div>
                    <!-- set language -->
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
            <!-- Hamburger -->
            <div aria-label="menu" role="button" class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-900 transition duration-150 ease-in-out rounded-md hover:text-red-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-300 focus:red-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
    </div>


    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('recipes.index')" :active="request()->routeIs('recipes.index')">
                {{ __('My') }} {{ __('Recipes') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="text-base font-medium text-gray-900">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-600">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
