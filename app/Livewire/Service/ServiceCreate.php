<?php

namespace App\Livewire\Service;

use App\Livewire\Forms\ServiceForm;
use App\Models\Customer;
use Livewire\Component;

class ServiceCreate extends Component
{
    public ServiceForm $form;

    public $modalServiceCreate = false;

    public function save()
    {
        $this->validate();

        try {

            $this->form->store();

            $this->dispatch('notify', title: 'success', message: 'data berhasil disimpan');

            $this->dispatch('dispatch-service-create-save')->to(ServiceTable::class);

            $this->dispatch('set-reset');

        } catch(\Exception $e) {
            $this->dispatch('notify', title: 'failed', message: 'data gagal disimpan');
        }
        
    }

    public function getCustomer($name)
    {
        return collect(Customer::select('id', 'name')->where('name', 'like', '%'.$name.'%')->get());
    }

    public function carChange()
    {
        $this->dispatch('set-type-create', id: $this->form->type, data: $this->form->setType());

        $this->resetErrorBag();
    }

    public function render()
    {
        // $this->dispatch('set-customer-create', id: $this->form->type, data: $this->form->setCustomer());
        $this->dispatch('set-car-create', id: $this->form->car, data: $this->form->setCar());

        return view('livewire.service.service-create');
    }
}
