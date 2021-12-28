<x-form.list.item-wrapper>
    <div class="flex flex-grow flex-col">
        <div class="flex flex-grow">
            <div class="flex-grow cursor-default">
                {{ ucwords($collection->label) }}
            </div>
            <x-svg.edit-pen :action="'editCollection'" />
            <x-svg.exit-delete :action="'deleteCollection'" />
        </div>

        <ul class="ml-2">
            @foreach($collection->statuses as $status)
                <livewire:board.status-collection.status.show-status :board="$board" :status="$status" :wire:key="'status_'.$status->id" />
            @endforeach
        </ul>
    </div>

    <!-- Hidden Focusable Section -->
    @if($editingProperties)
        <x-popup.focused-content :title="'Editing Collection'" :closeMethodName="'stopEditing'">
            <livewire:forms.status-collection-form :board="$board" :collection="$collection" />
        </x-popup.focused-content>
    @endif
</x-form.list.item-wrapper>
