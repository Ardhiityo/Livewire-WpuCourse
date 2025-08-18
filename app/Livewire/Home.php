<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{
    #[Title('Home')]
    public function render()
    {
        return <<<'HTML'
        <div class="container mx-auto mt-30">
            <h3>Home</h3>
        </div>
        HTML;
    }
}
