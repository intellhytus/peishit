<?php

use App\Models\Chirp;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    public Collection $chirps;

    public ?Chirp $editing = null;
    public ?Chirp $commenting = null;

    public function mount(): void
    {
        $this->getChirps();
    }
    #[On('chirp-created')]
    public function getChirps(): void
    {
        $this->chirps = Chirp::with('user')
            ->latest()
            ->get();
    }
    //adicionado comentário
    public function toggleComments(Chirp $chirp): void
    {
        // Alterna entre mostrar e esconder os comentários
        if ($this->commenting && $this->commenting->is($chirp)) {
            $this->commenting = null; // Se o chirp já está sendo comentado, fecha a área de comentários
        } else {
            $this->commenting = $chirp; // Caso contrário, exibe os comentários do chirp atual
        }
    }

    public function addComment(Chirp $chirp, string $message): void
    {
        $chirp->comments()->create([
            'user_id' => auth()->id(),
            'message' => $message,
        ]);

        $this->getChirps(); // Atualiza a lista de posts e comentários
    }

    public function edit(Chirp $chirp): void
    {
        $this->editing = $chirp;

        $this->getChirps();
    }
    #[On('chirp-edit-canceled')]
    #[On('chirp-updated')]
    public function disableEditing(): void
    {
        $this->editing = null;

        $this->getChirps();
    }

    public function delete(Chirp $chirp): void
    {
        $this->authorize('delete', $chirp);

        $chirp->delete();

        $this->getChirps();
    }
}; ?>

{{--Scritps--}}

<div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
    @foreach ($chirps as $chirp)
        <div class="p-6 flex space-x-2" wire:key="chirp-{{ $chirp->id }}">
            <!-- Outras informações do Chirp -->
            <x-icon name="user-circle" class="w-5 h-5" />
            <div class="flex-1">
                <div class="flex justify-between items-center">
                    <div>
                        <span class="text-gray-800">{{ $chirp->user->name }}</span>
                        <small class="ml-2 text-sm text-gray-600">{{ $chirp->created_at->format('j M Y, g:i a') }}</small>
                        @unless($chirp->created_at->eq($chirp->updated_at))
                            <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                        @endunless
                    </div>
                </div>
                    <!-- Botão de comentar -->
                    <button wire:click="toggleComments({{ $chirp->id }})" style="margin-left: 90%; margin-bottom: 15px; border: none">
                        <svg
                            stroke-linejoin="round"
                            stroke-linecap="round"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            height="44"
                            width="44"
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-8 hover:scale-125 duration-200 hover:stroke-blue-500"
                            fill="none"
                        >
                            <path fill="none" d="M0 0h24v24H0z" stroke="none"></path>
                            <path d="M8 9h8"></path>
                            <path d="M8 13h6"></path>
                            <path
                                d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z"
                            ></path>
                        </svg>
                        {{ $chirp->comments->count() }}
                    </button>

                <!-- Exibição dos comentários -->
                @if ($chirp->is($commenting))
                    <div class="mt-4 bg-gray-100 p-4 rounded-lg">
                        <!-- Lista de comentários -->
                        @foreach ($chirp->comments as $comment)
                            <div class="mb-2">
                                <strong>{{ $comment->user->name }}</strong>
                                <p class="text-sm text-gray-700">{{ $comment->message }}</p>
                            </div>
                        @endforeach

                        <!-- Formulário para adicionar novo comentário -->
                        <form wire:submit.prevent="addComment({{ $chirp->id }}, $event.target.message.value)">
                            <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                                <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                                    <label for="comment" class="sr-only">Your comment</label>
                                    <textarea name="message" rows="2" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Diga aí, irmão" required></textarea>
                                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                                </div>
                                <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                                    <x-primary-button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                        {{ __('Comment') }}
                                    </x-primary-button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>


<script>
    function toggleDropdown(id) {
        const dropdown = document.getElementById(id);
        if (dropdown) {
            dropdown.classList.toggle('hidden');
        } else {
            console.error(`Dropdown with ID "${id}" not found.`);
        }
    }
</script>

