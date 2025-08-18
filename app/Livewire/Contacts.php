<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use App\Livewire\Forms\ContactForm;

class Contacts extends Component
{
    public ContactForm $form;

    public function save()
    {
        $this->validate();

        Contact::create($this->form->all());

        $this->reset();
    }

    public function store()
    {
        $this->save();

        session()->flash('success', 'Your message has been sent successfully!');
    }

    public function render()
    {
        return view('livewire.contacts');
    }
}
