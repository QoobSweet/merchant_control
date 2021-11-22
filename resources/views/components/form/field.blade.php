<div class="flex mb-2">
    @if(!isset($type))
        @if(!isset($readonly) || !$readonly)
            <input type="text" class="shadow appearance-none border rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                wire:model="{{ $fieldName }}"
                name="{{ $fieldName }}"
                title="{{ $fieldLabel }}"
                placeholder="{{ $fieldLabel }}"
            />
        @else
            <label class="text-sm font-bold flex-grow whitespace-nowrap" for="{{ $fieldName }}">{{ $fieldLabel }}:</label>
            <input type="text" class="text-xs text-right flex-grow bg-transparent border-none appearance-none rounded w-full p-1 px-2 leading-tight focus:outline-none focus:shadow-outline"
                   wire:model="{{ $fieldName }}"
                   name="{{ $fieldName }}"
                   title="{{ $fieldLabel }}"
                   disabled
            />
        @endif
    @elseif($type == "select" && isset($options))
        @if(!isset($readonly) || !$readonly)
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
        @else
            <label class="text-sm font-bold flex-grow whitespace-nowrap" for="{{ $fieldName }}">{{ $fieldLabel }}</label>
            <input type="text" class="text-xs text-right flex-grow bg-transparent border-none appearance-none rounded w-full p-1 px-2 leading-tight focus:outline-none focus:shadow-outline"
                   wire:model="{{ $fieldName }}"
                   name="{{ $fieldName }}"
                   title="{{ $fieldLabel }}"
                   disabled
            />
        @endif
    @endif
    @error($fieldName) <span class="error">{{ $message }}</span> @enderror
</div>
