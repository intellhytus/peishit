<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;
    public string $email = '';
    public string $password = '';
    /**
     * Handle an incoming authentication request.
     */
    public function render():mixed
    {
        return view('livewire.pages.auth.login');
    }
    public function login(): void
    {
        $validated = $this->validate([
            'form.email' => ['required', 'string', 'email'],
            'form.password' => ['required', 'string'],
        ]);

        // Tenta autenticar o usuário
        if (Auth::attempt(['email' => $this->form->email, 'password' => $this->form->password], $this->form->remember ?? false)) {
            // Redireciona para a página inicial
            session()->flash('success', 'Login bem-sucedido!');
            $this->redirect(route('chirps'));
        } else {
            session()->flash('error', 'Sua sessão expirou. Faça login novamente.');
            redirect(route('login'));
        }
    }
} ?>


    <!-- component -->

<!-- component -->
<!-- Container -->
<!-- component -->
<body class="bg-gray-700 ">
<div class="flex min-h-screen items-center justify-center">
    <form wire:submit.prevent="login" wire:key="login-form" class="min-h-1/2 bg-gray-900  border border-gray-900 rounded-2xl ">
        <div class="min-h-1/2 bg-gray-900  border border-gray-900 rounded-2xl">
            @if(\session()->has('error'))
                <div style="padding: 30px">
                    <x-alert title="Error Message!" negative padding="small">
                        <x-slot name="slot">
                            Credenciais não válidas! <b>Faça login novamente</b>
                        </x-slot>
                    </x-alert>
                </div>
            @endif
            <div
                class="mx-4 sm:mx-24 md:mx-34 lg:mx-56 mx-auto  flex items-center space-y-4 py-16 font-semibold text-gray-500 flex-col">
                <svg viewBox="0 0 24 24" class=" h-12 w-12 text-white" fill="currentColor">
                    <g>
                        <path
                            d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                        </path>
                    </g>
                </svg>

                <h1 class="text-white text-2xl">Iniciar sessão em Peishit</h1>

                <!-- Email Input -->
                {{--            <x-input-label for="email" class="block mb-2 text-sm font-medium text-white-900 text-white" :value="__('Email')" />--}}
                <x-text-input wire:model="form.email" id="email"
                              class="w-full p-2 bg-gray-900 rounded-md  border border-gray-700 focus:border-blue-700"
                              type="email" name="email" required autofocus autocomplete="username" placeholder="Email"/>
                <x-input-error :messages="$errors->get('form.email')" class="mt-2"/>


                <x-text-input wire:model="form.password" id="password"
                              class="w-full p-2 bg-gray-900 rounded-md border border-gray-700" type="password"
                              name="password" required autocomplete="current-password" placeholder="Password"/>
                <x-input-error :messages="$errors->get('form.password')" class="mt-2"/>

                <!-- Remember Me Checkbox -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input wire:model="form.remember" id="remember" type="checkbox"
                               class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                               name="remember">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="remember"
                               class="font-light text-gray-500 dark:text-gray-300">{{ __('Remember me') }}</label>
                    </div>
                </div>

                <!-- Submit Button -->
                <button dusk="entrar" type="submit"
                        class="w-full text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Entrar
                </button>


                <!-- Additional Links -->
                <div class="flex justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-primary-600 hover:underline dark:text-primary-500"
                           href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                    @endif
                    <a href="{{ route('register') }}"
                       class="text-sm text-primary-600 hover:underline dark:text-primary-500"
                       style="padding-left: 20px">
                        Criar conta
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
