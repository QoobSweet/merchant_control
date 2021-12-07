<x-form.list.item-wrapper>
    <div class="flex flex-grow ">
        <div class="flex-grow cursor-default">
            {{ ucwords($collection->label) }}
        </div>
        <x-svg.edit-pen :action="'editCollection'" />
        <x-svg.exit-delete :action="'deleteCollection'" />
    </div>

    <!-- Hidden Focusable Section -->
    @if($editingProperties)
        <x-popup.focused-content :title="'Editing Collection'" :closeMethodName="'stopEditing'">
            <livewire:forms.status-collection-form :board="$board" :collection="$collection" />
        </x-popup.focused-content>
    @endif
</x-form.list.item-wrapper>
