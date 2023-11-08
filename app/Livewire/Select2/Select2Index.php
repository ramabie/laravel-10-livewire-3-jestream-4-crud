<?php

namespace App\Livewire\Select2;

use App\Models\Customer;
use Livewire\Component;

class Select2Index extends Component
{
    public $city = 'CF';
    // public $customer = 12;
    public $customer;

    public $percobaan;

    public function store()
    {
        $this->validate();

        try {

            $this->dispatch('notification', icon: 'success', title: 'Post successfully updated.');

        } catch (\Exception) {
            $this->dispatch('notification', icon: 'error', title: 'Post failed updated.');
        }
    }

    public function fetchData($val) {

        // $data_customer = [];

        $query = Customer::where('name', 'like', '%'.$val.'%')->get();

        // if (isset($query)) {
        //     foreach ($query as $ind => $customer) {
        //         $data_customer[$ind] = [
        //             'id' => $customer->id,
        //             'name' => $customer->name,
        //         ];
        //     }
        // }

        // return collect($query);

        $this->dispatch('set-data-customer', data_customer: collect($query), val: $val);
    }

    public function sending()
    {
        session()->flash('status', 'Post successfully updated.');
        $this->redirect('/customer', navigate: true);

    }

    public function getData()
    {
        // return collect(['id' => 1, 'name' => 2]);

        return collect(Customer::limit(2));
    }

    public function notify()
    {
        try {

            // processing save or update

            $this->dispatch('notification', icon: 'success', title: 'Post successfully updated.');

        } catch(\Exception $e) {

            // failed save or update

            $this->dispatch('notification', icon: 'error', title: 'Post failed updated.');
        }
    }

    public function render()
    {
        return view('livewire.select2.select2-index', [
            'customers' => Customer::all()
        ]);
    }

}
