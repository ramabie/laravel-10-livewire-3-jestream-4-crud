@for($i = 1; $i <= 2; $i++)

    <!-- Customer {{ $i }} -->
    <div class="col-span-5 mt-3">
        <div wire:ignore>
            <x-label for="customer.{{ $i }}" value="Customer {{ $i }}" />
            <x-select
                wire:model="customer.{{ $i }}" id="customer-{{ $i }}" class="mt-1 w-full" multiple
                x-init="
                    $('#customer-{{ $i }}').select2({
                        placeholder: 'select an option',
                    });
                    $('#customer-{{ $i }}').on('change', function () {
                        $wire.set('customer.{{ $i }}', $(this).val())
                    });
                    $('#customer-{{ $i }}').trigger('change');
                "
            >
                <option></option>
                @foreach($datas as $cs)
                    <option value="{{ $cs->id }}">{{ $cs->name }}</option>
                @endforeach
            </x-select>
        </div>
        <div class="text-red-600">@error('customer.'.$i) {{ $message }} @enderror</div>
    </div>

@endfor