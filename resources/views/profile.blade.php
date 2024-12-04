<title>Peishit</title>
<x-app-layout>
    <div class="py-12 bg-gray-700 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Profile Photo Section -->
            <div class="p-4 sm:p-8 bg-gray-900 shadow border border-gray-800 rounded-2xl flex items-center space-x-6">
                <div class="w-24 h-24 rounded-full overflow-hidden bg-gray-800">
                    <img src="https://i.pinimg.com/474x/d5/c8/eb/d5c8ebdfa1eb3ec56d3c284577f3a1c6.jpg" alt="{{ Auth::user()->name }}" class="object-cover w-full h-full">

                </div>
                <div class="flex flex-col items-center space-y-4">
                    <h3 class="text-lg font-semibold text-gray-100">{{ Auth::user()->name }}</h3>
                    <p class="text-sm text-gray-400">{{ Auth::user()->email }}</p>

                    <!-- Upload Button -->
                    <livewire:profile-photo-upload />

                </div>
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
    </div>
</x-app-layout>
