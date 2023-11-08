<?php

namespace App\Livewire\Service;

use App\Livewire\Forms\ServiceForm;
use App\Models\Customer;
use App\Models\Service;
use Livewire\Attributes\On;
use Livewire\Component;

class ServiceEdit extends Component
{
    public ServiceForm $form;

    public $modalServiceEdit = false;

    #[On('dispatch-service-table-edit')]
    public function set_service(Service $id)
    {
        $this->form->setService($id);

        $get_customer = Customer::select('id', 'name')->where('id', $this->form->customer)->first();

        $this->dispatch('set-customer-edit', id: $this->form->customer, data: collect($get_customer));
        $this->dispatch('set-car-edit', id: $this->form->car, data: $this->form->setCar());
        $this->dispatch('set-type-edit', id: $this->form->type, data: $this->form->setType());

        $this->modalServiceEdit = true;
    }

    public function getCustomer($name)
    {
        return collect(Customer::select('id', 'name')->where('name', 'like', '%'.$name.'%')->get());
    }

    public function carChange()
    {
        $this->dispatch('set-type-edit', id: $this->form->type, data: $this->form->setType());

        $this->resetErrorBag();
    }

    public function edit()
    {
        $this->validate();

        try {

            $this->form->update();

            $this->dispatch('notify', title: 'success', message: 'data berhasil di update');

            $this->dispatch('dispatch-service-create-edit')->to(ServiceTable::class);

        } catch (\Exception $e) {
            $this->dispatch('notify', title: 'failed', message: 'data gagal di update');
        }
        
    }

    public function render()
    {
        return view('livewire.service.service-edit');
    }
}
