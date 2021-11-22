<div class="mt-2 ml-4">
    <div class="flex flex-col w-64 p-2 bg-gray-200 rounded-lg" >
        <!-- Header -->
        <div id="section_{{ $section->id }}_title" class="flex p-1">
            <h2 class="flex-grow ml-3 text-black text-center font-bold">{{ ucfirst($section->title) }}</h2>
            <div  wire:click="editSection" class="float-right hover:bg-gray-300 ml-2">
                <x-svg.menubar />
            </div>
        </div>

        <!-- Main Content -->
        @foreach($leads as $lead)
            <livewire:board.lead.show-lead :board="$section->board" :lead="$lead" />
        @endforeach

        <!-- Action Button For Creating Leads -->
        <div wire:click="$emit('createLead')" id="section_{{ $section->id }}_add_lead_button" class="flex cursor-pointer mt-1 h-10 rounded-md border-gray-600 border-2 border-dashed hover:bg-gray-300">
            <div class="m-auto">+ New Lead</div>
        </div>
    </div>

    <!-- Hidden Focusable Sections -->
    @if($editingProperties)
        <x-popup.focused-content :title="'New Section'" :closeMethodName="'closeSection'">
            <livewire:forms.section-form :board="$section->board" :section="$section"/>
        </x-popup.focused-content>
    @endif
</div>


