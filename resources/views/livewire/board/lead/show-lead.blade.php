<div name="lead_shadow" class="flex h-24 mt-1 rounded bg-gray-300">
    <div name="lead_content" class="flex flex-col flex-grow mt-0 mb-[3px] ml-0 mr-px rounded bg-white">
        <!-- Lead Context Bars -->
        <div id="lead_context_bars" class="flex h-2 m-1">
            <div class="w-1/5 ml-1 {{ $lead->stateAriaColor() }} rounded-full"></div>
            <div class="w-3/5 ml-1 {{ $lead->valueAriaColor() }} rounded-full"></div>
        </div>

        <!-- Lead Excerpt Content -->
        <div class="flex flex-col m-1 flex-grow">
            <div class="flex-grow h-8 text-sm">
                <label>{{ ucfirst($lead->title) . ' - ' . ucfirst($lead->contact_name) }}</label>
                <label class="font-italic pl-2 text-xs">{{ $lead->contact_phone }}</label>
            </div>
            <div class="flex h-5">
                <div  wire:click="editLead" class="max-h-4 hover:bg-gray-100">
                    <x-svg.menubar />
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden Focusable Sections -->
    @if($editingProperties)
        <x-popup.focused-content :title="$lead->contact_name . ' - ' . $lead->title" :closeMethodName="'closeLead'">
            <livewire:forms.lead-form :board="$board" :lead="$lead"/>
        </x-popup.focused-content>
    @endif
</div>
