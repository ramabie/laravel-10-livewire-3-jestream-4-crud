<?php

namespace App\Livewire\Select2;

use App\Models\Customer;
// use Livewire\Attributes\Rule;
use Livewire\Component;

class Select2Multiple extends Component
{

    public $inputs = [];
    // public function mount()
    // {
    //     $this->fill([
    //         'inputs' => collect(['customer' => ''])
    //     ]);
    // }

    public function store()
    {

        $this->validate(
            [
                'inputs' => 'required',
                'inputs.*.customer' => 'required',
            ],
            [
                'inputs.*.customer.required' => 'tidak boleh kosong',
            ]
        );
        
        dd($this->inputs);
    }

    public function render()
    {
        return view('livewire.select2.select2-multiple', [
            'datas' => Customer::all()
        ]);
    }
}