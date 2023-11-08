<?php

namespace App\Livewire\Reward;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class RewardIndex extends Component
{
    #[Title('Reward')]
    public function render() : View
    {
        return view('livewire.reward.reward-index');
    }
}
