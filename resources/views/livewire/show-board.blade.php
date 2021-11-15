<div id="full-content-wrapper" class="flex flex-col flex-grow bg-gray-400">
    <div id="board-header" class="flex flex-grow max-h-10 bg-gray-800">
        <h1 class="m-auto text-white text-center">Board Title</h1>
    </div>
    <div id="board-content" class="flex flex-grow flex-row bg-blue-200">
        @foreach($sections as $section)
            <div wire:key="{{ $loop->index }}" class="w-64 my-2 ml-2 bg-gray-200 rounded-lg" >
                <div id="section_title_{{ $section->id }}" class="flex h-10">
                    <h2 class="mt-3 ml-3 text-black text-center">={{ $section->title }}</h2>
                </div>
                <div id="section_content_shadow_{{ $section->id }}" class="flex h-20 mt-1 mx-2 rounded bg-gray-300">
                    <div id="section_content_{{ $section->id }}" class="flex-grow mt-0 mb-[3px] ml-0 mr-px rounded bg-white">

                    </div>
                </div>
            </div>
        @endforeach
        <button wire:click="createSection" class="w-64 my-2 ml-2 mr-2 bg-gray-200 rounded-lg hover:bg-gray-300" :board="$board">Create Section</button>
    </div>
</div>
