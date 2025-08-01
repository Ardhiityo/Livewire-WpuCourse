<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class User extends Component
{
    use WithFileUploads, WithPagination;

    #[Validate(['required', 'min:3'])]
    public $name = '';

    #[Validate(['required', 'email:dns', 'unique:users,email'])]
    public $email = '';

    #[Validate(['required', 'min:3'])]
    public $password = '';

    #[Validate(['nullable', 'image', 'max:1000'])]
    public $avatar = '';

    public $keyword = '';

    public function search()
    {
        // problem nya adalah ketika berada di halaman selain 1, maka jika mencari data di halaman pertama maka akan tidak tampil, kecuali mencari di halaman pertama maka akan mencari semua data, reset page digunakan untuk mereset halaman sehingga bisa mencari semua data
        $this->resetPage();
    }

    // method bawaan livewire yang akan dipanggil ketika ada perubahan pada property keyword
    public function updatedKeyword()
    {
        // problem nya adalah ketika berada di halaman selain 1, maka jika mencari data di halaman pertama maka akan tidak tampil, kecuali mencari di halaman pertama maka akan mencari semua data, reset page digunakan untuk mereset halaman sehingga bisa mencari semua data
        $this->resetPage();
    }

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
    }

    public function render()
    {
        $users = \App\Models\User::where('name', 'like', '%' . $this->keyword . '%')
            ->latest()->paginate(6);

        return view('livewire.user', compact('users'));
    }
}
