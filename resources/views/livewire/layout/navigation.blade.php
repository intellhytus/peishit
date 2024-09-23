<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
        {{ __('Dashboard') }}
    </x-nav-link>
    <x-nav-link :href="route('chirps')" :active="request()->routeIs('chirps')" wire:navigate>
        {{ __('Peixes') }}
    </x-nav-link>
    <x-nav-link :href="route('profile')" :active="request()->routeIs('profile')" wire:navigate>
        {{ __('Perfil') }}
    </x-nav-link>
    <x-nav-link :href="route('logout')" :active="request()->routeIs('logout')" wire:navigate>
        {{ __('Sair') }}
    </x-nav-link>
</div>
