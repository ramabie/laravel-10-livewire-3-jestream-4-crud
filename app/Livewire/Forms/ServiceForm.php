<?php

namespace App\Livewire\Forms;

use App\Models\Car;
use App\Models\Customer;
use App\Models\Service;
use App\Models\Type;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ServiceForm extends Form
{
    public ?Service $service;

    public $id;

    #[Rule('required', as: 'Customer')]
    public $customer;

    #[Rule('required', as: 'Car')]
    public $car;

    #[Rule('required', as: 'Type')]
    public $type;

    public function setService(Service $service) : void
    {
        $this->service = $service;

        $this->id = $service->id;
        $this->customer = $service->customer->id;
        $this->type = $service->type->id;
        $this->car = $service->type->car->id;
    }

    public function setCustomer() : array
    {
        $setCustomer = [];
        $customers = Customer::select('id', 'name')->get();
        foreach ($customers as $ind => $data) {
            $setCustomer[$ind] = ['id' => $data->id, 'name' => $data->name];
        }

        return $setCustomer;
    }

    public function setCar() : array
    {
        $setCar = [];
        $cars = Car::select('id', 'name')->get();
        foreach ($cars as $ind => $data) {
            $setCar[$ind] = ['id' => $data->id, 'name' => $data->name];
        }

        return $setCar;
    }

    public function setType() : array
    {
        $setType = [];
        $types = Type::select('id', 'name')->where('car_id', $this->car)->get();
        foreach ($types as $ind => $data) {
            $setType[$ind] = ['id' => $data->id, 'name' => $data->name];
        }

        return $setType;
    }

    public function store() : void
    {
        Service::create([
            'customer_id' => $this->customer,
            'type_id' => $this->type,
        ]);
    }

    public function update()
    {
        $this->service->where('id', $this->id)
            ->update([
                'customer_id' => $this->customer,
                'type_id' => $this->type,
            ]);
    }
}
