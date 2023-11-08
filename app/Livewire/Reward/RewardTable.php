<?php

namespace App\Livewire\Reward;

use App\Livewire\Forms\RewardForm;
use App\Models\Reward;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class RewardTable extends Component
{
    use WithPagination;
    use WithSorting;

    public RewardForm $form;

    public $customer_name;

    public
        $paginate = 5,
        $sortBy = 'rewards.id',
        $sortDirection = 'desc';

    #[On('dispatch-reward-create-save')]
    #[On('dispatch-reward-create-edit')]
    #[On('dispatch-reward-delete-del')]
    public function render()
    {
        return view('livewire.reward.reward-table', [
            'data' => Reward::select('rewards.id', 'customers.name as customer_name', 'month', 'year', 'rewards.name as reward_name')
                ->join('customers', 'customers.id', 'rewards.customer_id')
                ->where('customers.name', 'like', '%'.$this->customer_name.'%')
                ->where('rewards.month', 'like', '%'.$this->form->month.'%')
                ->where('rewards.year', 'like', '%'.$this->form->year.'%')
                ->where('rewards.name', 'like', '%'.$this->form->name.'%')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate),
        ]);
    }
}
