<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <h1 class="text-3xl mb-5">Customer</h1>

                @if (session('status'))
                    <div class="mb-4 p-5 font-medium text-sm text-green-600 bg-green-300">
                        {{ session('status') }}
                    </div>
                @endif
                
                <livewire:customer.customer-create />

                <livewire:customer.customer-edit />
                
                <livewire:customer.customer-delete />

                <livewire:customer.customer-table />

            </div>
        </div>
    </div>
</div>
