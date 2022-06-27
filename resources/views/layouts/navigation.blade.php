<nav x-data="{ open: false }" class="border-b border-gray-100 bg-white text-slate-800 fixed top-0 left-0 right-0 opacity-90">
    @if (Route::has('login'))
    @auth
    @else
        <a href="{{ route('login') }}" class="text-sm text-slate-800 underline ">Log in</a>
    @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 text-sm text-slate-800 underline ">Register</a>
    @endif
    @endauth
   
    @endif
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-screen sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('index') }}">
                        <x-header-icon class="block w-auto lg:h-10 md:h-9 sm:h-8 text-slate-800 self-center " />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="space-x-8 sm:-my-px sm:ml-2 sm:flex self-center">
                    <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                        {{ __('Recipes') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-md font-medium text-slate-900 transition duration-150 ease-in-out hover:text-red-500 focus:border-red-600 focus:text-red-400 ">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    
                    <x-slot name="content">
                        <x-dropdown-link :href="route('recipes.index')">{{ __('My recipes') }}</x-dropdown-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
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
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('recipes.index')" :active="request()->routeIs('recipes.index')">
                {{ __('My Recipes') }}
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
