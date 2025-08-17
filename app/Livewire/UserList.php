<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public $keyword = '';

    #[On('user-created')]
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

    //Melakukan animasi loading ketika data sedang diambil
    public function placeholder()
    {
        return view('livewire.placeholder.user-list');
    }

    #[Computed()]
    public function users()
    {
        return \App\Models\User::where('name', 'like', '%' . $this->keyword . '%')
            ->latest()->paginate(6);
    }

    // public function render()
    // {
    //     return view('livewire.user-list');
    // }
}
