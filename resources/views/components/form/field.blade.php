<div class="flex-grow mb-2">
    @if(!isset($type))
        <input type="text" class="shadow appearance-none border rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
               wire:model="{{ $fieldName }}"
               name="{{ $fieldName }}"
               title="{{ $fieldLabel }}"
               placeholder="{{ $fieldLabel }}"
        />
    @elseif($type == "select" && isset($options))
        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            wire:model="{{ $fieldName }}"
            name="country"
            title="Select {{ $fieldLabel }}"
        >
            <option value=''>{{ $fieldLabel }}...</option>
            @foreach($options as $option)
                <option value={{ $option->id }}>{{ $option->label }}</option>
            @endforeach
        </select>
    @endif
    @error($fieldName) <span class="error">{{ $message }}</span> @enderror
</div>
