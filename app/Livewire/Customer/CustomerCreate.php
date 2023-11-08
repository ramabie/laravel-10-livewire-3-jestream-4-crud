<?php

namespace App\Livewire\Customer;

use App\Livewire\Forms\CustomerForm;
use Livewire\Component;

class CustomerCreate extends Component
{
    public CustomerForm $form;

    public $modalCustomerCreate = false;

    public function save()
    {
        $this->validate();
        try {

            $this->form->store();

            $this->dispatch('dispatch-customer-create-save')->to(CustomerTable::class);

            $this->dispatch('sweet-alert', icon: 'success', title: 'data berhasil disimpan');

            $this->dispatch('set-reset');

        } catch (\Exception $e) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'data gagal disimpan');
        }
        
    }

    public function render()
    {
        return view('livewire.customer.customer-create');
    }
}
