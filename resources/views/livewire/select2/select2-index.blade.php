<div x-data>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reward') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <h1 class="text-3xl font-bold">Livewire 3 with Select2 (Remote Data)</h1>
                
                <div class="grid grid-cols-12 gap-20">

                    <!-- City -->
                    <div wire:ignore class="col-span-3 mt-3">
                        <x-label for="city" value="Name" />
                        <x-select
                            wire:model="city" id="city" class="mt-1 w-full"
                            x-init="
                                $('#city').select2({
                                    placeholder: 'select an option'
                                });
                                $('#city').on('change', function () {
                                    $wire.set('city', $(this).val())
                                });
                                $('#city').trigger('change');
                            "
                        >
                            <option></option>
                            <option value="AL">Alabama</option>
                            <option value="CF">California</option>
                            <option value="TB">Tuban</option>
                        </x-select>
                    </div>

                    <!-- Customer -->
                    <div wire:ignore class="col-span-3 mt-3">
                        <x-label for="customer" value="Customer" />
                        <x-select
                            wire:model="customer" id="customer" class="mt-1 w-full"
                                x-init="
                                $('#customer').select2({
                                    placeholder: 'select an option',
                                    minimumInputLength: 1,
                                });
                                $('#customer').on('change', function () {
                                    $wire.set('customer', $(this).val())
                                });
                                $('#customer').trigger('change');
                                $('#customer').on('select2:open', function (e) {

                                    $(':input.select2-search__field').on('input', function () {

                                        if ($(this).val().length >= 2) {

                                            if ($(e.target).attr('id') === 'customer') {

                                                $wire.call('fetchData', $(this).val());
                                                // $('#customer').trigger('change');
                                            }
                                        }

                                    })
                                });
                            "
                            @set-data-customer.window="
                                event.detail.data_customer.forEach(function (customer) {

                                    if (!($('#customer').find('option[value=&quot;' + customer.id + '&quot;]').length)) {
                                        $('#customer').append(new Option(customer.name, customer.id, false, false)).trigger('change');
                                    }

                                });

                            "
                        >
                            <option></option>
                        </x-select>
                
                        
                    </div>

                    <div wire:ignore class="col-span-3 mt-3">
                        <x-label for="js-example-data-ajax" value="Customer"/>
                        <x-select
                            id="js-example-data-ajax" class="w-64"
                            x-init="
                                $('#js-example-data-ajax').select2({
                                    ajax: {
                                        url: 'https://api.github.com/search/repositories',
                                        dataType: 'json',
                                        delay: 250,
                                        data: function (params) {
                                            return {
                                                q: params.term, // search term
                                                page: params.page
                                            };
                                        },
                                        processResults: function (data, params) {
                                            // parse the results into the format expected by Select2
                                            // since we are using custom formatting functions we do not need to
                                            // alter the remote JSON data, except to indicate that infinite
                                            // scrolling can be used
                                            params.page = params.page || 1;

                                            console.log(data)
                                            
                                            return {
                                                results: data.items,
                                                pagination: {
                                                    more: (params.page * 30) < data.total_count
                                                }
                                            };


                                        },
                                        cache: true,
                                    },
                                        placeholder: 'Search for a repository',
                                        minimumInputLength: 1,
                                        templateResult: formatRepo,
                                        templateSelection: formatRepoSelection
                                    });

                                    function formatRepo (repo) {
                                        if (repo.loading) {
                                            return repo.text;
                                        }

                                        var $container = $(
                                            `<div class='select2-result-repository clearfix'>` +
                                            `<div class='select2-result-repository__avatar'><img src='` + repo.owner.avatar_url + `' /></div>` +
                                            `<div class='select2-result-repository__meta'>` +
                                                `<div class='select2-result-repository__title'></div>` +
                                                `<div class='select2-result-repository__description'></div>` +
                                                `<div class='select2-result-repository__statistics'>` +
                                                `<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> </div>` +
                                                `<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> </div>` +
                                                `<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> </div>` +
                                                `</div>` +
                                            `</div>` +
                                            `</div>`
                                        );

                                        $container.find('.select2-result-repository__title').text(repo.full_name);
                                        $container.find('.select2-result-repository__description').text(repo.description);
                                        $container.find('.select2-result-repository__forks').append(repo.forks_count + ' Forks');
                                        $container.find('.select2-result-repository__stargazers').append(repo.stargazers_count + ' Stars');
                                        $container.find('.select2-result-repository__watchers').append(repo.watchers_count + ' Watchers');

                                        return $container;
                                    }

                                    function formatRepoSelection (repo) {
                                        return repo.full_name || repo.text;
                                    }
                            "
                        >

                        </x-select>
                    </div>

                    <!-- City -->
                    <div wire:ignore class="col-span-4 mt-3">
                        <x-label for="percobaan" value="Percobaan" />
                        <x-select
                            wire:model="percobaan" id="percobaan" class="mt-1 w-full"
                            x-init="
                                $('#percobaan').select2({
                                    placeholder: 'Search for a repository',
                                    minimumInputLength: 1,
                                    ajax: {
                                        url: $wire.call('getData', true),
                                        dataType: 'json',
                                        // processResults: function (data) {
                                        // // Transforms the top-level key of the response object from 'items' to 'results'
                                        //     return  {
                                        //         results: data.items
                                        //     };

                                        //     // console.log(cobacoba)
                                        // }
                                        // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                                    }
                                });
                            "
                        >
                            <option></option>
                        </x-select>
                    </div>

                    <div class="col-span-12 lg:col-span-3 mt-3">

                        <p>City : {{ $city }}</p>
                        <p class="mt-4">Customer : {{ $customer }}</p>

                    </div>

                </div>

                <x-button wire:click="sending" type="button">Sending Flash</x-button>
                <x-button wire:click="notify" type="button" class="ml-4">Sending Notify</x-button>
            </div>

        </div>
    </div>

    <div>
        <livewire:select2.select2-multiple />
    </div>

</div>
