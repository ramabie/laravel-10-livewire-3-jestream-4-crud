<?php

namespace App\Livewire\Forms;

use App\Models\Customer;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CustomerForm extends Form
{
    public ?Customer $customer;

    public $id;

    #[Rule('required|min:3', as: 'Name')]
    public $name;

    #[Rule('required|email', as: 'Email')]
    public $email;

    #[Rule('required|min:3', as: 'Address')]
    public $address;

    #[Rule('required|array')]
    public $hobbies;

    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;

        $this->name = $customer->name;
        $this->email = $customer->email;
        $this->address = $customer->address;
        $this->hobbies = $customer->hobbies;
    }

    public function store()
    {
        Customer::create($this->except(['id', 'customer']));

        $this->reset();
    }

    public function update()
    {
        $this->customer->update($this->except(['id', 'customer']));
    }

}
