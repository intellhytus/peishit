<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilePhotoUpload extends Component
{
    use WithFileUploads;

    public $photo;

    // Método para fazer o upload da foto de perfil
    public function uploadProfilePhoto()
    {
        // Validando se o arquivo é uma imagem e se tem no máximo 1MB
        $this->validate([
            'photo' => 'image|max:1024', // Máximo de 1MB
        ]);

        // Armazenando a foto na pasta 'profile-photos' dentro do disco 'public'
        $path = $this->photo->store('profile-photos', 'public');
        // Atualizando a foto de perfil do usuário
        $user = Auth::user();
        $user->profile_photo_url = Storage::url($path);
        $user->save();

        // Mensagem de sucesso
        session()->flash('message', 'Foto de perfil atualizada com sucesso!');
    }

    public function render()
    {
        return view('livewire.profile-photo-upload');
    }
}
