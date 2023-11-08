<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reward') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <h1 class="text-3xl mb-5">Reward</h1>
                
                <livewire:reward.reward-create />

                <livewire:reward.reward-edit />
                
                <livewire:reward.reward-delete />

                <livewire:reward.reward-table />

            </div>
        </div>
    </div>
</div>
