<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;

class User extends Component
{
    #[Validate(['required', 'min:3'])]
    public $name = '';

    #[Validate(['required', 'email:dns', 'unique:users,email'])]
    public $email = '';

    #[Validate(['required', 'min:3'])]
    public $password = '';

    public function createUser()
    {
        $this->validate();

        \App\Models\User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);

        // mereset semua
        $this->reset();

        //hanya mereset name
        // $this->reset(['name']);

        session()->flash('status', 'User successfully created.');
    }

    public function render()
    {
        $users = \App\Models\User::all();

        return view('livewire.user', compact('users'));
    }
}
