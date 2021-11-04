<!-- Board Header -->
<span id="board_{{ $board->id }}_header" class="text-xl p-2 bg-blue-300">
    <b>{{ ucfirst($board->name) }}</b> | {{ $board->is_personal ===  0 ? "Public" : "Personal" }} Workspace  |  {{  $board->team !== null ? $board->team->name : 'No Team Assigned' }}
</span>
<!-- Board Content -->
<div class="flex flex-grow bg-gray-200">
    @foreach ($board->sections as $section)
        <div id="section" class="sm:w-full md:w-1/4 lg:w-1/5 m-3 rounded-lg bg-gray-300 overflow-hidden">
            <div id="section_header" class="text-center border-b-2 p-1 bg-white">
                <h1 class="text-lg"><b>Sample Section</b></h1>
            </div>
            <!--  -->
            <div ondrop="drop(event)" ondragover="allowDrop(event)" class="h-full">
                @foreach ($section->leads as $lead)
                    <div id="lead_{{ $lead->id }}"
                        draggable="true"
                        ondragstart="drag(event)"
                        class="flex flex-col min-w-1/4 sm:max-w-1/3 max-h-20 m-1 my-2 p-1 rounded-xl bg-white"
                    >
                        <div class="flex px-2 space-x-1">
                            <div class="h-2 max-w-1/4 w-10 float-left rounded-lg bg-gray-300"></div>
                            <div class="h-2 max-w-1/4 w-10 float-left rounded-lg bg-gray-300"></div>
                            <div class="h-2 flex-grow w-10 float-left rounded-lg bg-gray-300"></div>
                        </div>
                        <div id="lead_{{  $lead->id }}_title" class="px-2 mt-1 text-sm">
                            <h1><b>{{ ucfirst($lead->title) }}</b></h1>
                        </div>
                        <div id="lead_{{ $lead->id }}_excerpt">
                            <p class="text-xs pl-4 leading-tight float-left">{{ $lead->contact_name }}</p>
                            <p class="text-xs pl-4 leading-tight float-left">{{ sprintf("(%s) %s-%s",
                                substr($lead->contact_phone, 0, 3),
                                substr($lead->contact_phone, 3, 3),
                                substr($lead->contact_phone, 6, 4)); }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
<script>
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }

    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        ev.target.appendChild(document.getElementById(data));
    }
</script>
