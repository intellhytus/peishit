<?php

use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new class extends Component {

    public string $message = '';
    public bool $isSubmitting = false; // Flag de controle para submissão
    public function store(): void
    {
        if ($this->isSubmitting) {
            return; // Evita múltiplas requisições simultâneas
        }
        $this->isSubmitting=true;
        $validated = $this->validate([
            'message' => 'required|string|max:255',
        ]);

        auth()->user()->chirps()->create($validated);

        $this->message = '';

        $this->dispatch('chirp-created');

        $this->isSubmitting = false; // Restaura o estado após completar
    }
}; ?>
<div>
    <form wire:submit.prevent="store">
        @csrf
        <textarea wire:model="message"
                  placeholder="{{'Poste um Peixe!F'}}"
                  class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                  name="chirp"
        ></textarea>

        <x-input-error :messages="$errors->get('message')" class="mt-2" />
        <x-primary-button dusk="chirps-submit" class="mt-4">Peixar</x-primary-button>
    </form>
</div>
