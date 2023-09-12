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

        $simpan = $this->form->store();

        is_null($simpan)
        ? $this->dispatch('notify', title: 'success', message: 'data berhasil disimpan')
        : $this->dispatch('notify', title: 'failed', message: 'data gagal disimpan');

        $this->dispatch('dispatch-customer-create-save')->to(CustomerTable::class);
    }

    public function render()
    {
        return view('livewire.customer.customer-create');
    }
}
