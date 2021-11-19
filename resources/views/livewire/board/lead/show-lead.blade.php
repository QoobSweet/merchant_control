<div name="lead_shadow" class="flex h-24 mt-1 rounded bg-gray-300">
    <div name="lead_content" class="flex flex-col flex-grow mt-0 mb-[3px] ml-0 mr-px rounded bg-white">
        <!-- Lead Context Bars -->
        <div id="lead_context_bars" class="flex h-2 m-1">

            <div class="w-1/5 ml-1 bg-blue-400 rounded-full"></div>
            <div class="w-1/5 ml-1 bg-red-400 rounded-full"></div>
            <div class="flex-grow ml-1 bg-green-400 rounded-full"></div>
        </div>

        <!-- Lead Excerpt Content -->
        <div class="flex flex-col m-1 flex-grow">
            <div class="flex-grow h-8 text-sm">
                <label>{{ ucfirst($lead->title) . ' - ' . ucfirst($lead->contact_name) }}</label>
                <label class="font-italic pl-2 text-xs">{{ $lead->contact_phone }}</label>
            </div>
            <div class="flex h-5">
                <div  wire:click="$emit('editLead', {{ $lead }})" class="max-h-4 hover:bg-gray-100">
                    <x-svg.menubar />
                </div>
            </div>
        </div>
    </div>
</div>
