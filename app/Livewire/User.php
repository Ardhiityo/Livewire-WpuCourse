<?php

namespace App\Livewire;

use Livewire\Component;

class User extends Component
{
    public $name;
    public $email;
    public $password;

    public function createUser()
    {
        \App\Models\User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);

        // mereset semua
        $this->reset();

        //hanya mereset name
        // $this->reset(['name']);
    }

    public function render()
    {
        $users = \App\Models\User::all();

        return view('livewire.user', compact('users'));
    }
}
