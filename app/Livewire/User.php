<?php

namespace App\Livewire;

use Livewire\Component;

class User extends Component
{

    public function createUser()
    {
        return \App\Models\User::create([
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt('password')
        ]);
    }

    public function render()
    {
        $users = \App\Models\User::all();

        return view('livewire.user', compact('users'));
    }
}
