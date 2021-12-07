<div class="flex mb-2 {{ isset($width) ? 'w-' . $width : '' }} {{ isset($inline) && $inline === true ? 'space-x-2 text-right' : 'flex-col space-y-1'}} align-middle items-baseline">
    @if((isset($readonly) && $readonly === true) || !isset($showLabel) || $showLabel === true)
        @if(isset($inline) && $inline === true) <div class="flex w-1/2"> @endif
            <x-form.field.label :name="$fieldName ?? str_replace(' ', '_', $fieldLabel)" :value="ucfirst($fieldLabel)" />
        @if(isset($inline) && $inline === true) </div> @endif
    @endif

    @if(!isset($type))
        <input type="text" class="text-sm shadow appearance-none border rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            wire:model="{{ $fieldName ?? '' }}"
            name="{{ $fieldName ?? str_replace(' ', '_', $fieldLabel) }}"
            title="{{ $fieldLabel }}"
            placeholder="{{ $placeholder ?? $fieldLabel ?? '' }}..."
            {{ isset($readonly) && $readonly === true  ? 'disabled' : '' }}
        />
    @elseif($type == "select" && isset($options))
        <x-form.field.select
            :label="$fieldLabel"
            :fieldName="$fieldName ?? ''"
            :name="$fieldName ?? str_replace(' ', '_', $fieldLabel)"
            :options="$options"
            :disabled="(isset($readonly) && $readonly === true)"
        />
    @endif
    @error($fieldName ?? str_replace(' ', '_', $fieldLabel)) <span class="error">{{ $message }}</span> @enderror
</div>
