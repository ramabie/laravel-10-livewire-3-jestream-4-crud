<?php

namespace App\Livewire\Service;

use App\Models\Service;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class ServiceDelete extends Component
{
    #[Locked]
    public $id;

    #[Locked]
    public $name;

    public $modalServiceDelete = false;

    #[On('dispatch-service-table-delete')]
    public function set_service($id, $name)
    {
        $this->id = $id;
        $this->name = $name;

        $this->modalServiceDelete = true;
    }

    public function del()
    {
        try {
            Service::destroy($this->id);

            $this->dispatch('notify', title: 'success', message: 'data berhasil dihapus');

            $this->modalServiceDelete = false;

        $this->dispatch('dispatch-service-delete-del')->to(ServiceTable::class);

        } catch(\Exception $e) {
            $this->dispatch('notify', title: 'failed', message: 'data gagal dihapus');
        }
    }

    public function render()
    {
        return view('livewire.service.service-delete');
    }
}
