<div class="mb-2">
    <input type="text" wire:model="{{ $fieldName }}"
           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
           placeholder="{{ $fieldLabel }}"
    >
    @error($fieldName) <span class="error">{{ $message }}</span> @enderror
</div>
