<x-board.column-wrapper :title="$status->statusCollection->label . ': ' . $status->label" :id="$status->id" :menuActionName="'editSection'">
    <!-- Main Content -->
    @foreach($leads as $lead)
        <livewire:board.lead.show-lead :board="$lead->board" :lead="$lead" />
    @endforeach

    <!-- Action Button For Creating Leads -->
    <div wire:click="$emit('createLead')" id="section_{{ $status->id }}_add_lead_button" class="flex cursor-pointer mt-1 h-10 rounded-md border-gray-600 border-2 border-dashed hover:bg-gray-300">
        <div class="m-auto">+ New Lead</div>
    </div>

{{--    <!-- Hidden Focusable Sections -->--}}
{{--    @if($editingProperties)--}}
{{--        <x-popup.focused-content :title="'Edit Section'" :closeMethodName="'closeSection'">--}}
{{--            <livewire:forms.section-form :board="$section->board" :section="$section"/>--}}
{{--        </x-popup.focused-content>--}}
{{--    @endif--}}
</x-board.column-wrapper>


