<?php

namespace App\Livewire\Service;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class ServiceIndex extends Component
{
    #[Title('Service')]
    public function render() : View
    {
        return view('livewire.service.service-index');
    }
}
