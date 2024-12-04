<div class="bg-gray-900 border-b border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
        <!-- Logo -->
        <div class="flex items-center space-x-4">
            <img class="h-10 w-10 rounded-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQo4hUQPFEIBR2PCWBtTTHOT8_xxADJ7XIq7A&s" alt="{{ Auth::user()->name }}">
            <h1 class="text-xl font-semibold text-gray-100">Peishit</h1>
        </div>

        <!-- Navbar Links -->
        <div class="hidden md:flex space-x-8">
            <x-nav-link
                :href="route('chirps')"
                :active="request()->routeIs('chirps')"
                class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white focus:bg-gray-700 focus:text-white {{ request()->routeIs('chirps') ? 'bg-gray-700 text-white' : '' }}">
                {{ __('Peixes') }}
            </x-nav-link>
            <x-nav-link
                :href="route('profile')"
                :active="request()->routeIs('profile')"
                class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white focus:bg-gray-700 focus:text-white {{ request()->routeIs('profile') ? 'bg-gray-700 text-white' : '' }}">
                {{ __('Perfil') }}
            </x-nav-link>
            <x-nav-link
                :href="route('logout')"
                :active="request()->routeIs('logout')"
                class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white focus:bg-gray-700 focus:text-white {{ request()->routeIs('logout') ? 'bg-gray-700 text-white' : '' }}">
                {{ __('Sair') }}
            </x-nav-link>
        </div>

        <!-- Hamburger Menu (Mobile) -->
        <div class="md:hidden">
            <button @click="open = !open" class="text-gray-400 hover:text-gray-200 focus:outline-none">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" class="md:hidden bg-gray-800">
        <x-nav-link
            :href="route('chirps')"
            :active="request()->routeIs('chirps')"
            class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white focus:bg-gray-700 focus:text-white {{ request()->routeIs('chirps') ? 'bg-gray-700 text-white' : '' }}">
            {{ __('Peixes') }}
        </x-nav-link>
        <x-nav-link
            :href="route('profile')"
            :active="request()->routeIs('profile')"
            class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white focus:bg-gray-700 focus:text-white {{ request()->routeIs('profile') ? 'bg-gray-700 text-white' : '' }}">
            {{ __('Perfil') }}
        </x-nav-link>
        <x-nav-link
            :href="route('logout')"
            :active="request()->routeIs('logout')"
            class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white focus:bg-gray-700 focus:text-white {{ request()->routeIs('logout') ? 'bg-gray-700 text-white' : '' }}">
            {{ __('Sair') }}
        </x-nav-link>
    </div>
</div>
