<div>
    <x-select wire:model.live="paginate" class="text-xs mt-8">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
    </x-select>

    <table class="w-full mt-2">
        <thead>
            <tr>
                <th class="p-2 whitespace-nowrap border border-spacing-1">#</th>
                <th class="p-2 whitespace-nowrap border border-spacing-1">Action</th>
                <th @click="$wire.sortField('services.id')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :$sortDirection :$sortBy :field="'services.id'" /> ID
                </th>
                <th @click="$wire.sortField('customers.name')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :$sortDirection :$sortBy :field="'customers.name'" /> Customer
                </th>
                <th @click="$wire.sortField('cars.name')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :$sortDirection :$sortBy :field="'cars.name'" /> Car
                </th>
                <th @click="$wire.sortField('types.name')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :$sortDirection :$sortBy :field="'types.name'" /> Type
                </th>
            </tr>
            <tr>
                <td class="p-2 border border-spacing-1"></td>
                <td class="p-2 border border-spacing-1"></td>
                <td class="p-2 border border-spacing-1"><x-input wire:model.live="form.id" type="search" class="w-full text-sm" /></td>
                <td class="p-2 border border-spacing-1"><x-input wire:model.live="form.customer" type="search" class="w-full text-sm" /></td>
                <td class="p-2 border border-spacing-1"><x-input wire:model.live="form.car" type="search" class="w-full text-sm" /></td>
                <td class="p-2 border border-spacing-1"><x-input wire:model.live="form.type" type="search" class="w-full text-sm" /></td>
            </tr>
        </thead>
        <tbody>
            @isset($data)
                @foreach($data as $service)
                    <tr>
                        <td class="p-2 border border-spacing-1 text-center">{{ $loop->iteration }}.</td>
                        <td class="p-2 border border-spacing-1">
                            <x-button @click="$dispatch('dispatch-service-table-edit', { id: '{{ $service->id }}' })" type="button">Edit</x-button>
                            <x-danger-button @click="$dispatch('dispatch-service-table-delete', { id: '{{ $service->id }}', name: '{{ $service->customer }}' })">Delete</x-danger-button>
                        </td>
                        <td class="p-2 border border-spacing-1 text-center">{{ $service->id }}</td>
                        <td class="p-2 border border-spacing-1">{{ $service->customer }}</td>
                        <td class="p-2 border border-spacing-1">{{ $service->car }}</td>
                        <td class="p-2 border border-spacing-1">{{ $service->type }}</td>
                    </tr>
                @endforeach
            @endisset
        </tbody>
    </table>

    <div class="mt-3">{{ $data->onEachSide(1)->links() }}</div>
</div>
