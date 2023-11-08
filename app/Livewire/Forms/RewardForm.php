<?php

namespace App\Livewire\Forms;

use App\Models\Reward;
use Illuminate\Database\Query\Builder;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Locked;
use Livewire\Form;

class RewardForm extends Form
{
    public ?Reward $reward;

    #[Locked]
    public $id;

    public $customer;
    public $month;
    public $year;
    public $name;

    protected $validationAttributes = [
        'customer' => 'Customer',
        'month' => 'Month',
        'year' => 'Year',
        'name' => 'Reward',
    ];

    public function rules() : array 
    {
        return [
            'customer' => [
                'required',
                'integer',
                Rule::unique('rewards', 'customer_id')
                    ->where(function (Builder $query) {
                        $query->where('month', $this->month);
                        $query->where('year', $this->year);
                    })
                    ->ignore($this->id, 'id')
            ],
            'month' => [
                'required',
                'integer',
                'min:1',
                'max:12',
                Rule::unique('rewards', 'month')
                    ->where(function (Builder $query) {
                        $query->where('customer_id', $this->customer);
                        $query->where('year', $this->year);
                    })
                    ->ignore($this->id, 'id')
            ],
            'year' => [
                'required',
                'integer',
                'digits:4',
                Rule::unique('rewards', 'year')
                    ->where(function (Builder $query) {
                        $query->where('customer_id', $this->customer);
                        $query->where('month', $this->month);
                    })
                    ->ignore($this->id, 'id')
            ],
            'name' => [
                'required',
                'string',
                'min:3',
            ]
        ];
    }

    public function setReward(Reward $reward)
    {
        $this->reward = $reward;

        $this->id = $reward->id;
        $this->customer = $reward->customer_id;
        $this->month = $reward->month;
        $this->year = $reward->year;
        $this->name = $reward->name;
    }

    public function store()
    {
        Reward::create([
            'customer_id' => $this->customer,
            'month' => $this->month,
            'year' => $this->year,
            'name' => $this->name,
        ]);

        $this->reset();
    }

    public function update()
    {
        Reward::where('id', $this->id)->update([
            'customer_id' => $this->customer,
            'month' => $this->month,
            'year' => $this->year,
            'name' => $this->name,
        ]);
    }

}
