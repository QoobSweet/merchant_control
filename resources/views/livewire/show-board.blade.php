<div id="full-content-wrapper" class="flex flex-col flex-grow bg-gray-400">
    <!-- Header -->
    <div id="board-header" class="flex flex-grow max-h-10 bg-gray-800">
        <h1 class="m-auto text-white text-center">Board Title</h1>
    </div>

    <!-- Main Content -->
    <div id="board-content" class="flex flex-row flex-grow p-1">
        @foreach($board->sections as $section)
            <livewire:board.show-section :board="$board" :section="$section" :wire:key="$section->id" />
        @endforeach

        <!-- Action Button For Creating Sections -->
        <button wire:click="createSection" class="max-h-28 w-64 m-2 ml-4 border-gray-600 border-2 border-dashed rounded-lg bg-gray-100 hover:bg-gray-200" :board="$board">Create Section</button>
    </div>

    <!-- Hidden Focusable Sections -->
    @if($creatingSection)
        <livewire:forms.section-form :board="$board" />
    @elseif($creatingLead)
        <livewire:forms.lead-form :board="$board" />
    @elseif($editingSection)
        <livewire:forms.section-form :board="$board" :lead="$activeSection"/>
    @elseif($editingLead)
        <livewire:forms.lead-form :board="$board" :lead="$activeLead"/>
    @endif
</div>
