<title>Peishit</title>
<x-app-layout>
    <div class="flex min-h-screen bg-gray-700">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white hidden md:block">
            <div class="p-4 border-b border-gray-600">
                <h1 class="text-xl font-bold text-center">Peishit</h1>
            </div>
            <nav class="mt-4">
                <ul>
                    <li class="px-4 py-2 hover:bg-gray-700" style="padding: 30px; font-size: 1.25rem; font-weight: bold;">
                        <x-nav-link
                            :href="route('chirps')"
                            :active="request()->routeIs('chirps')"
                            class="text-white hover:text-gray-300 {{ request()->routeIs('chirps') ? 'bg-gray-700' : '' }}">
                            <x-carbon-fish-multiple class="h-5 w-5 text-white hover:text-gray-300" />
                            <span style="margin-left: 55px; width: 140px" class="hover:text-gray-300">{{ __('Peixes') }}</span>
                        </x-nav-link>
                    </li>
                    <li class="px-4 py-2 hover:bg-gray-700" style="padding: 30px; font-size: 1.25rem; font-weight: bold;">
                        <x-nav-link
                            :href="route('profile')"
                            :active="request()->routeIs('profile')"
                            class="text-white hover:text-gray-300 {{ request()->routeIs('profile') ? 'bg-gray-700' : '' }}">
                            <x-sui-home-door class="h-5 w-5 text-white hover:text-gray-300" />
                            <span style="margin-left: 55px; width: 140px" class="hover:text-gray-300">{{ __('Perfil') }}</span>
                        </x-nav-link>
                    </li>
                    <li class="px-4 py-2 hover:bg-gray-700" style="padding: 30px; font-size: 1.25rem; font-weight: bold;">
                        <x-nav-link
                            :href="route('logout')"
                            :active="request()->routeIs('logout')"
                            class="text-white hover:text-gray-300 {{ request()->routeIs('logout') ? 'bg-gray-700' : '' }}">
                            <x-tabler-logout class="h-5 w-5 text-white hover:text-gray-300" />
                            <span style="margin-left: 55px; width: 140px" class="hover:text-gray-300">{{ __('Sair') }}</span>
                        </x-nav-link>
                    </li>
                </ul>
            </nav>


        </aside>
        <!-- Main Content -->
        <main class="flex-1 py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto">
                @if(session()->has('success'))
                    <x-alert id="success-alert" style="margin-top: 10px; width: 50%; margin-left: 103%" title="Success Message!" positive padding="none">
                        <x-slot name="slot">
                            This is a success alert — <b>check it out!</b>
                        </x-slot>
                    </x-alert>
                @endif

                <livewire:chirps.create />

                <livewire:chirps.list />
            </div>
        </main>
    </div>

    <!-- Responsive Mobile Navbar -->
    <div class="fixed bottom-0 left-0 right-0 bg-gray-800 text-white md:hidden">
        <div class="flex justify-around py-2">
            <a href="#" class="flex flex-col items-center">
                <span class="text-xs">Peixes</span>
            </a>
            <a href="#" class="flex flex-col items-center">
                <span class="text-xs">Perfil</span>
            </a>
            <a href="#" class="flex flex-col items-center">
                <span class="text-xs">Sair</span>
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const alert = document.getElementById('success-alert');
            if (alert) {
                setTimeout(() => {
                    alert.style.transition = 'opacity 0.5s';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                }, 2000);
            }
        });
    </script>
</x-app-layout>
