<?php

namespace App\Livewire\Reward;

use App\Livewire\Forms\RewardForm;
use App\Models\Customer;
use App\Models\Reward;
use Livewire\Attributes\On;
use Livewire\Component;

class RewardEdit extends Component
{
    public RewardForm $form;

    public $modalRewardEdit = false;

    #[On('dispatch-reward-table-edit')]
    public function set_reward(Reward $id)
    {
        $this->form->setReward($id);

        $this->modalRewardEdit = true;
    }

    public function edit()
    {
        $this->validate();

        $update = $this->form->update();

        is_null($update)
        ? $this->dispatch('notify', title: 'success', message: 'data berhasil di update')
        : $this->dispatch('notify', title: 'failed', message: 'data gagal di update');

        $this->dispatch('dispatch-reward-create-edit')->to(RewardTable::class);
    }

    public function render()
    {
        return view('livewire.reward.reward-edit', [
            'customers' => Customer::all()
        ]);
    }
}
