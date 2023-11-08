<div>
    <x-dialog-modal wire:model.live="modalRewardEdit" submit="edit">
        <x-slot name="title">
            Form Edit Reward
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">

                <!-- Customer -->
                <div class="col-span-12">
                    <x-label for="form.customer" value="Customer" />
                    <x-select wire:model="form.customer" id="form.customer" type="text" class="mt-1 w-full" require autocomplete="form.customer">
                        <option></option>
                        @isset($customers)
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        @endisset
                    </x-select>
                    <x-input-error for="form.customer" class="mt-1" />
                </div>

                <!-- Month -->
                <div class="col-span-12">
                    <x-label for="form.month" value="Month" />
                    <x-select  wire:model="form.month" id="form.month" type="text" class="mt-1 w-full" require autocomplete="form.month">
                        <option></option>
                        @for($i=1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </x-select>
                    <x-input-error for="form.month" class="mt-1" />
                </div>

                <!-- Year -->
                <div class="col-span-12">
                    <x-label for="form.year" value="Year" />
                    <x-select  wire:model="form.year" id="form.year" type="text" class="mt-1 w-full" require autocomplete="form.year">
                    <option></option>
                        @for($i=2021; $i <= date("Y"); $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </x-select>
                    
                    <x-input-error for="form.year" class="mt-1" />
                </div>

                <!-- Reward -->
                <div class="col-span-12">
                    <x-label for="form.name" value="Name" />
                    <x-input wire:model="form.name" id="form.name" type="text" class="mt-1 w-full" require autocomplete="form.name" />
                    <x-input-error for="form.name" class="mt-1" />
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalRewardEdit', false)" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-button class="ml-3" wire:loading.attr="disabled">
                Update
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
