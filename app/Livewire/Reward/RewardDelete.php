<?php

namespace App\Livewire\Reward;

use App\Models\Reward;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class RewardDelete extends Component
{
    #[Locked]
    public $id;

    #[Locked]
    public $name;

    public $modalRewardDelete = false;

    #[On('dispatch-reward-table-delete')]
    public function set_reward($id, $name)
    {
        $this->id = $id;
        $this->name = $name;

        $this->modalRewardDelete = true;
    }

    public function del()
    {
        $del = Reward::destroy($this->id);

        ($del)
        ? $this->dispatch('notify', title: 'success', message: 'data berhasil dihapus')
        : $this->dispatch('notify', title: 'failed', message: 'data gagal dihapus');

        $this->modalRewardDelete = false;

        $this->dispatch('dispatch-reward-delete-del')->to(RewardTable::class);
    }

    public function render()
    {
        return view('livewire.reward.reward-delete');
    }
}
