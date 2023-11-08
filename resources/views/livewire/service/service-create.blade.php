<div>
    <x-button @click="$wire.set('modalServiceCreate', true)">Create Service</x-button>

    <x-dialog-modal wire:model.live="modalServiceCreate" submit="save">
        <x-slot name="title">
            Form Service
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
                        wire:model="form.customer"
                        ::id="$id('text-input')" class="mt-1 w-full" require>
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
                        @set-car-create.window="
                            $el.car.addOption(event.detail.data);
                        "
                        @set-reset.window="$el.car.clear()"
                        wire:change="carChange"
                        wire:model="form.car"
                        ::id="$id('text-input')" class="mt-1 w-full" require autocomplete="car-create">
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
                        @set-type-create.window="
                            $el.types.clear();
                            $el.types.clearOptions();
                            $el.types.addOption(event.detail.data);
                        "
                        @set-reset.window="$el.types.clear(); $el.types.clearOptions();"
                        wire:model="form.type"
                        ::id="$id('text-input')" class="mt-1 w-full" require autocomplete="type-create">
                        <option></option>
                    </x-tom>
                    <x-input-error for="form.type" class="mt-1" />
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalServiceCreate', false)" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-button class="ml-3" wire:loading.attr="disabled">
                Simpan
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
