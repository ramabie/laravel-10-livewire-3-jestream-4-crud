<?php

namespace App\Livewire\Service;

use App\Livewire\Forms\ServiceForm;
use App\Models\Service;
use App\Models\User;
use App\Traits\WithSorting;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceTable extends Component
{
    use WithPagination;
    use WithSorting;

    public ServiceForm $form;

    public
        $paginate = 5,
        $sortBy = 'services.id',
        $sortDirection = 'desc';

    #[On('dispatch-service-create-save')]
    #[On('dispatch-service-create-edit')]
    #[On('dispatch-service-delete-del')]
    public function render()
    {
        return view('livewire.service.service-table', [
            'data' => Service::select(
                    'services.id as id',
                    'customers.name as customer',
                    'cars.name as car',
                    'types.name as type',
                )
                ->join('customers', 'customers.id', 'services.customer_id')
                ->join('types', 'types.id', 'services.type_id')
                ->join('cars', 'cars.id', 'types.car_id')
                ->where('services.id', 'like', '%'.$this->form->id.'%')
                ->where('customers.name', 'like', '%'.$this->form->customer.'%')
                ->where('cars.name', 'like', '%'.$this->form->car.'%')
                ->where('types.name', 'like', '%'.$this->form->type.'%')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate),
        ]);
    }
}
