<div>
    <x-dialog-modal wire:model.live="modalCustomerEdit" submit="edit">
        <x-slot name="title">
            Form Edit Customer
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">

                <!-- Name -->
                <div class="col-span-12">
                    <x-label for="form.name" value="Name" />
                    <x-input wire:model="form.name" id="form.name" type="text" class="mt-1 w-full" require autocomplete="form.name" />
                    <x-input-error for="form.name" class="mt-1" />
                </div>

                <!-- Email -->
                <div class="col-span-12">
                    <x-label for="form.email" value="Email" />
                    <x-input  wire:model="form.email" id="form.email" type="text" class="mt-1 w-full" require autocomplete="form.email" />
                    <x-input-error for="form.email" class="mt-1" />
                </div>

                <!-- Address -->
                <div class="col-span-12">
                    <x-label for="form.address" value="Address" />
                    <x-input  wire:model="form.address" id="form.address" type="text" class="mt-1 w-full" require autocomplete="form.address" />
                    <x-input-error for="form.address" class="mt-1" />
                </div>

                <div class="col-span-12">
                    <x-label for="form.hobbies" value="Hobbies" />
                    <x-tom
                        x-init="$el.hobbies = new Tom($el, {
                            sortField: {
                                field: 'hobbies',
                                direction: 'asc'
                            },
                            valueField: 'hobbies',
                            labelField: 'hobbies',
                            searchField: 'hobbies'
                        })"
                        @set-hobbies-edit.window="
                            $el.hobbies.addOptions(event.detail.data)
                            $el.hobbies.addItems(event.detail.data)
                        "
                        wire:model="form.hobbies"
                        id="form.hobbies" multiple class="mt-1 w-full"
                    >
                        <option></option>
                        @foreach(\App\Helpers\HobbiesHelper::list() as $hobby)
                            <option>{{ $hobby }}</option>
                        @endforeach
                    </x-tom>
                    <x-input-error for="form.hobbies" class="mt-1" />
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalCustomerEdit', false)" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-button class="ml-3" wire:loading.attr="disabled">
                Update
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
