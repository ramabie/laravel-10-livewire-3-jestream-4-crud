<?php

namespace App\Livewire\Reward;

use App\Livewire\Forms\RewardForm;
use App\Models\Customer;
use Livewire\Component;

class RewardCreate extends Component
{
    public RewardForm $form;

    public $modalRewardCreate = false;

    public function save()
    {
        $this->validate();

        $simpan = $this->form->store();

        is_null($simpan)
        ? $this->dispatch('notify', title: 'success', message: 'data berhasil disimpan')
        : $this->dispatch('notify', title: 'failed', message: 'data gagal disimpan');

        $this->dispatch('dispatch-reward-create-save')->to(RewardTable::class);
    }

    public function render()
    {
        return view('livewire.reward.reward-create', [
            'customers' => Customer::all()
        ]);
    }
}
