<x-form.list.item-wrapper>
    <div class="flex flex-grow">
        <div class="flex-grow cursor-default">
            <a wire:click="editStatus" class="text-sm cursor-pointer text-{{ $status->ariaColor->aria_color_tag }}">{{ $status->label }}</a>
        </div>
        <x-svg.edit-pen :action="'editStatus'" />
        <x-svg.exit-delete :action="'deleteStatus'" />
    </div>

    <!-- Hidden Focusable Section -->
    @if($editingProperties)
        <x-popup.focused-content :title="'Editing Status'" :closeMethodName="'stopEditing'">
            <livewire:forms.status-form :board="$board" :status="$status" />
        </x-popup.focused-content>
    @endif
    @if($editingCollection)
        <x-popup.focused-content :title="'Editing Collection'" :closeMethodName="'stopEditing'">
            <livewire:forms.status-collection-form :board="$board" :collection="$status->statusCollection" />
        </x-popup.focused-content>
    @endif
</x-form.list.item-wrapper>


