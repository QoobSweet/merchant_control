<x-popup.focused-content>
    @if(isset($lead))
        <div wire:click="toggleLeadDisplayCard" class="absolute cursor-pointer ml-5 mt-2 text-white hover:text-blue-200 whitespace-nowrap hover:font-bold">
            {{ $editingProperties ? 'Lead Overview...' : 'Edit Lead...' }}
        </div>
    @endif

    <div class="mr-5 -ml-5 mt-10 -mb-10 flex-grow p-2  max-w-10/12 bg-white rounded-md">
        <!-- Header -->
        <div class=" p-2 border-b font-bold">
            <h2>
                @if(isset($lead))
                    {{ $editingProperties ? 'Editing Lead' : 'Viewing Lead' }}
                @else
                    Create New Lead
                @endif
            </h2>
        </div>

        @if($editingProperties)
            <x-forms.lead-form-content :lead="$lead" :stateOptions="$stateOptions" :valueOptions="$valueOptions"/>
        @else
            <x-forms.lead-form-overview :lead="$lead" :stateOptions="$stateOptions" :valueOptions="$valueOptions"/>
        @endif
    </div>
</x-popup.focused-content>
