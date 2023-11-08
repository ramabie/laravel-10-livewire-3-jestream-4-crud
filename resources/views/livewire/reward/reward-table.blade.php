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
                <th @click="$wire.sortField('customers.name')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :$sortDirection :$sortBy :field="'customers.name'" /> Customer
                </th>
                <th @click="$wire.sortField('rewards.month')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :$sortDirection :$sortBy :field="'rewards.month'" /> Month
                </th>
                <th @click="$wire.sortField('rewards.year')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :$sortDirection :$sortBy :field="'rewards.year'" /> Year
                </th>
                <th @click="$wire.sortField('rewards.name')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :$sortDirection :$sortBy :field="'rewards.name'" /> Reward
                </th>
            </tr>
            <tr>
                <td class="p-2 border border-spacing-1"></td>
                <td class="p-2 border border-spacing-1"></td>
                <td class="p-2 border border-spacing-1"><x-input wire:model.live="customer_name" type="search" class="w-full text-sm" /></td>
                <td class="p-2 border border-spacing-1"><x-input wire:model.live="form.month" type="search" class="w-full text-sm" /></td>
                <td class="p-2 border border-spacing-1"><x-input wire:model.live="form.year" type="search" class="w-full text-sm" /></td>
                <td class="p-2 border border-spacing-1"><x-input wire:model.live="form.name" type="search" class="w-full text-sm" /></td>
            </tr>
        </thead>
        <tbody>
            @isset($data)
                @foreach($data as $reward)
                    <tr>
                        <td class="p-2 border border-spacing-1 text-center">{{ $loop->iteration }}.</td>
                        <td class="p-2 border border-spacing-1">
                            <x-button @click="$dispatch('dispatch-reward-table-edit', { id: '{{ $reward->id }}' })" type="button">Edit</x-button>
                            <x-danger-button @click="$dispatch('dispatch-reward-table-delete', { id: '{{ $reward->id }}', name: '{{ $reward->name }}' })">Delete</x-danger-button>
                        </td>
                        <td class="p-2 border border-spacing-1">{{ $reward->customer_name }}</td>
                        <td class="p-2 border border-spacing-1">{{ $reward->month }}</td>
                        <td class="p-2 border border-spacing-1">{{ $reward->year }}</td>
                        <td class="p-2 border border-spacing-1">{{ $reward->reward_name }}</td>
                    </tr>
                @endforeach
            @endisset
        </tbody>
    </table>

    <div class="mt-3">{{ $data->onEachSide(1)->links() }}</div>
</div>
