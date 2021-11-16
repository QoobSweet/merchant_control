<div class="mt-2">
    <div class="flex flex-col w-64 ml-2 p-1 bg-gray-200 rounded-lg" >
        <div id="section_{{ $section->id }}_title" class="flex p-1">
            <h2 class="flex-grow ml-3 text-black text-center font-bold">{{ ucfirst($section['title']) }}</h2>
            <div  wire:click="removeSection" class="float-right hover:bg-gray-300 ml-2">
                <x-svg.menubar />
            </div>
        </div>
{{--        @foreach($leads as $lead)--}}
{{--            <div id="lead_{{ $lead->id }}_shadow" class="flex h-20 mt-1 rounded bg-gray-300">--}}
{{--                <div id="lead_{{ $lead->id }}_content" class="flex flex-col flex-grow mt-0 mb-[3px] ml-0 mr-px rounded bg-white">--}}
{{--                    <!-- Lead Content -->--}}
{{--                    <div id="lead_quick_contexts" class="h-2 m-1 bg-blue-300">--}}

{{--                    </div>--}}
{{--                    <label>{{ $lead['title'] }}</label>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
        <div wire:click="createLead" id=""section_{{ $section->id }}_add_lead_button class="flex cursor-pointer mt-1 h-6 rounded-b-md border border-gray-500 hover:bg-gray-300">
            <label  class="m-auto ">+ New Lead</label>
        </div>
    </div>
</div>


