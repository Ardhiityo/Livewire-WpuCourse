<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ContactForm extends Form
{
    #[Validate(['email:dns', 'required'])]
    public $email = '';

    #[Validate(['min:3', 'required'])]
    public $subject = '';

    #[Validate(['min:10', 'required'])]
    public $message = '';
}
