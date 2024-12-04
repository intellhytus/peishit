<div>
    <input type="file" id="photo" wire:model="photo" class="hidden">
    <button
        class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none"
        onclick="document.getElementById('photo').click()">
        Upload de Imagem
    </button>

    @error('photo')
    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
    @enderror

    @if (session()->has('message'))
        <span class="text-green-500 text-sm mt-2">{{ session('message') }}</span>
    @endif
</div>
