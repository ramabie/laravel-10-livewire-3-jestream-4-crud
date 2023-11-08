<div>
    <x-dialog-modal wire:model.live="modalServiceEdit" submit="edit">
        <x-slot name="title">
            Form Edit Service
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">

                <!-- Customer -->
                <div class="col-span-12" x-id="['text-input']">
                    <x-label ::for="$id('text-input')" value="Customer" />
                    <x-tom
                        x-init="$el.customer = new Tom($el, {
                            sortField: {
                                field: 'name',
                                direction: 'asc'
                            },
                            valueField: 'id',
                            labelField: 'name',
                            searchField: 'name',
                            openOnFocus: false,
                            load: function(query, callback) {

                                $wire.getCustomer(query).then(results => {
                                    callback(results);
                                }).catch(() => {
                                    callback();
                                })

                            },
                            render: {
                                option: function (item, escape) {
                                    return `<div>${escape(item.name)}</div>`
                                },
                                item: function (item, escape) {
                                    return `<div>${escape(item.name)}</div>`
                                }
                            }
                        });"
                        @set-customer-edit.window="
                            $el.customer.clear();
                            $el.customer.clearOptions();
                            $el.customer.addOption(event.detail.data);
                            $el.customer.addItem(event.detail.id);
                        "
                        wire:model="form.customer"
                        ::id="$id('text-input')" class="mt-1 w-full">
                        <option></option>
                    </x-tom>
                    <x-input-error for="form.customer" class="mt-1" />
                </div>

                <!-- Car -->
                <div class="col-span-12" x-id="['text-input']">
                    <x-label ::for="$id('text-input')" value="Car" />
                    <x-tom
                        x-init="$el.car = new Tom($el, {
                            sortField: {
                                field: 'name',
                                direction: 'asc'
                            },
                            valueField: 'id',
                            labelField: 'name',
                            searchField: 'name',
                        });"
                        @set-car-edit.window="
                            $el.car.addOption(event.detail.data);
                            $el.car.addItem(event.detail.id);
                        "
                        wire:change="carChange"
                        wire:model="form.car"
                        ::id="$id('text-input')" class="mt-1 w-full" require autocomplete="car-edit">
                        <option></option>
                    </x-tom>
                    <x-input-error for="form.car" class="mt-1" />
                </div>

                <!-- Type -->
                <div class="col-span-12" x-id="['text-input']">
                    <x-label ::for="$id('text-input')" value="Type" />
                    <x-tom
                        x-init="$el.types = new Tom($el, {
                            sortField: {
                                field: 'name',
                                direction: 'asc'
                            },
                            valueField: 'id',
                            labelField: 'name',
                            searchField: 'name',
                        });"
                        @set-type-edit.window="
                            $el.types.clear();
                            $el.types.clearOptions();
                            $el.types.addOption(event.detail.data);
                            $el.types.addItem(event.detail.id);
                        "
                        wire:model="form.type"
                        ::id="$id('text-input')" class="mt-1 w-full" require autocomplete="type-edit">
                        <option></option>
                    </x-tom>
                    <x-input-error for="form.type" class="mt-1" />
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalServiceEdit', false)" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-button class="ml-3" wire:loading.attr="disabled">
                Update
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
