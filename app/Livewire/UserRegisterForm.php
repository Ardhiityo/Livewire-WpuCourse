<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class UserRegisterForm extends Component
{
    use WithFileUploads;

    #[Validate(['required', 'min:3'])]
    public $name = '';

    #[Validate(['required', 'email:dns', 'unique:users,email'])]
    public $email = '';

    #[Validate(['required', 'min:3'])]
    public $password = '';

    #[Validate(['nullable', 'image', 'max:1000'])]
    public $avatar = '';

    public function createUser()
    {
        $this->validate();

        if ($this->avatar) {
            $this->avatar = $this->avatar->store('avatar', 'public');
        }

        \App\Models\User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'avatar' => $this->avatar
        ]);

        sleep(2);

        // mereset semua
        $this->reset();

        // hanya mereset name
        // $this->reset(['name']);

        session()->flash('status', 'User successfully created.');

        $this->dispatch('user-created');
    }

    public function render()
    {
        return view('livewire.user-register-form');
    }
}
