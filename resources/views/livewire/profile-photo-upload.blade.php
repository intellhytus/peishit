<div>
    <x-file wire:model="photo" accept="image/png, image/jpeg">
        <img src="{{ $user->avatar ?? '/empty-user.jpg' }}" class="h-40 rounded-lg" />
    </x-file>

    <button wire:click="salvarFoto" class="btn btn-primary mt-4">Salvar Foto</button>

    @if (session()->has('message'))
        <div class="alert alert-success mt-4">
            {{ session('message') }}
        </div>
    @endif
</div>
