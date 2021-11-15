<div id="full-content-wrapper" class="flex flex-col flex-grow bg-gray-400">
    <div id="board-header" class="flex flex-grow max-h-10 bg-gray-800">
        <h1 class="m-auto text-white text-center">Board Title</h1>
    </div>
    <div id="board-content" class="flex flex-grow flex-row p-1 bg-blue-200">
        @foreach($sections as $section)
            <livewire:board.show-section :section="$section" :wire:key="$section->id" />
        @endforeach
        <button wire:click="createSection" class="w-64 my-2 ml-2 mr-2 bg-gray-100 rounded-lg hover:bg-gray-300" :board="$board">Create Section</button>
    </div>
</div>
