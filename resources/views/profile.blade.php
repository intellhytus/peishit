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
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div>
                    <livewire:upload-photos />
                </div>
                <!-- Update Profile Information Form -->
                <div class="p-4 sm:p-8 bg-gray-900 shadow border border-gray-800 rounded-2xl">
                    <div class="max-w-xl">
                        <h3 class="text-lg font-semibold text-gray-100 mb-4">Atualizar Informações do Perfil</h3>
                        <livewire:profile.update-profile-information-form />
                    </div>
                </div>

                <!-- Update Password Form -->
                <div class="p-4 sm:p-8 bg-gray-900 shadow border border-gray-800 rounded-2xl">
                    <div class="max-w-xl">
                        <h3 class="text-lg font-semibold text-gray-100 mb-4">Atualizar Senha</h3>
                        <livewire:profile.update-password-form />
                    </div>
                </div>

                <!-- Delete User Form -->
                <div class="p-4 sm:p-8 bg-gray-900 shadow border border-gray-800 rounded-2xl">
                    <div class="max-w-xl">
                        <h3 class="text-lg font-semibold text-gray-100 mb-4">Excluir Conta</h3>
                        <livewire:profile.delete-user-form />
                    </div>
                </div>

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
</x-app-layout>
