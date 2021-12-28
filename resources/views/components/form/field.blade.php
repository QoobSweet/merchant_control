<div class="flex flex-col {{ isset($width) ? 'w-' . $width : '' }} px-1 mb-1">
    <div class="flex {{ isset($inline) && $inline === true ? 'space-x-2 text-right' : 'flex-col space-y-1'}} align-middle items-baseline">
        @if((isset($readonly) && $readonly === true))
            @if(isset($inline) && $inline === true) <div class="flex w-1/2"> @endif
                <x-form.field.label :name="$fieldName ?? str_replace(' ', '_', $fieldLabel)" :value="ucfirst($fieldLabel)" />
            @if(isset($inline) && $inline === true) </div> @endif
                @if(!isset($type))
                    <input type="text" class="{{ isset($inline) && $inline === true ? 'w-3/4' : ''}} text-sm text-right shadow appearance-none w-full py-1 px-2 ml-10 leading-tight bg-transparent border-0 border-transparent shadow-none"
                           wire:model="{{ $fieldName ?? '' }}"
                           name="{{ $fieldName ?? str_replace(' ', '_', $fieldLabel) }}"
                           title="{{ $fieldLabel }}"
                           disabled
                    />
                @elseif($type == "select" && isset($options))
                    <x-form.field.select :label="$fieldLabel" :fieldName="$fieldName ?? ''" :name="$fieldName ?? str_replace(' ', '_', $fieldLabel)" :options="$options" :disabled="true" />
                @endif
        @else
            @if(!isset($showLabel) || $showLabel === true)
                <x-form.field.label :name="$fieldName ?? str_replace(' ', '_', $fieldLabel)" :value="ucfirst($fieldLabel)" />
            @endif
            @if(!isset($type))
                <input type="text" class="{{ isset($inline) && $inline === true ? 'w-3/4' : ''}} text-sm text-right shadow appearance-none border rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    wire:model="{{ $fieldName ?? '' }}"
                    name="{{ $fieldName ?? str_replace(' ', '_', $fieldLabel) }}"
                    title="{{ $fieldLabel }}"
                    placeholder="{{ $placeholder ?? $fieldLabel ?? '' }}..."
                />
            @elseif($type == "select" && isset($options))
                <x-form.field.select :label="$fieldLabel" :fieldName="$fieldName ?? ''" :name="$fieldName ?? str_replace(' ', '_', $fieldLabel)" :options="$options" />
            @endif
        @endif
    </div>
    <div class="pl-2 text-red-500">
        @error($fieldName ?? str_replace(' ', '_', $fieldLabel)) <span class="flex flex-grow error float-right">{{ $message }}</span> @enderror
    </div>
</div>
