<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class About extends Component
{
    #[Title('About')]
    public function render()
    {
        return <<<'HTML'
        <div class="container mx-auto mt-30">
            <h3>About</h3>
        </div>
        HTML;
    }
}
