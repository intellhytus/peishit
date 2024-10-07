<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    public string $email = '';
    public string $password = '';

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $validated = $this->validate([
            'form.email' => ['required', 'string'],
            'form.password' => ['required', 'string'],
        ]);

        $this->form->authenticate($validated);

        Session::regenerate();

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
} ?>

    <!-- component -->

<!-- component -->
<!-- Container -->
<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <!-- Auth Card -->
    <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h2 class="text-center font-semibold text-xl lg:text-2xl text-gray-900 dark:text-white">
                Login
            </h2>

            <form wire:submit.prevent="login" class="space-y-4 md:space-y-6">
                <!-- Email Input -->
                <div>
                    <x-input-label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" :value="__('Email')" />
                    <x-text-input wire:model="form.email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="email" name="email" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                </div>

                <!-- Password Input -->
                <div>
                    <x-input-label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" :value="__('Password')" />
                    <x-text-input wire:model="form.password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input wire:model="form.remember" id="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" name="remember">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="remember" class="font-light text-gray-500 dark:text-gray-300">{{ __('Remember me') }}</label>
                    </div>
                </div>

                <!-- Submit Button -->
                <button dusk="entrar" type="submit" class="w-full text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Entrar
                </button>

                <!-- Additional Links -->
                <div class="flex justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-primary-600 hover:underline dark:text-primary-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    <a href="{{ route('register') }}" class="text-sm text-primary-600 hover:underline dark:text-primary-500">
                        Criar conta
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
