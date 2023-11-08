<div x-data>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Select2 Multiple') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <h1 class="text-3xl font-bold">Livewire 3 with Select2 Multiple</h1>

                <form wire:submit.prevent="store">

                    @dump($errors->all())
                
                    <div class="grid grid-cols-12 gap-20">
                    

                        @for($i = 0; $i <= 1; $i++)

                            <!-- Customer {{ $i }} -->
                            <div class="col-span-5 mt-3">
                                <div>
                                    <x-label value="Customer {{ $i }}" />
                                    <x-select wire:model="inputs.{{ $i }}.customer" class="mt-1 w-full">
                                        <option></option>
                                        @foreach($datas as $cs)
                                            <option value="{{ $cs->id }}">{{ $cs->name }}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                                <div class="text-red-600">@error('inputs') {{ $message }} @enderror</div>
                            </div>

                        @endfor

                    </div>

                    <div class="mt-4">
                        <x-button>Save</x-button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>
