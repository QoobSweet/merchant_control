<div id="full-content-wrapper" class="flex flex-col flex-grow bg-gray-400">
    <!-- Main Content -->
    <div id="board-content" class="flex flex-col flex-grow p-1">
        <!-- Header -->
        <div id="board-header" class="flex flex-grow max-h-10 bg-gray-800">
            <h1 class="m-auto text-white text-center">Board Title</h1>
        </div>

        <div class="flex flex-grow flex-row flex-wrap">
            @foreach($board->sections as $section)
                <livewire:board.show-section :board="$board" :section="$section" :wire:key="$section->id" />
            @endforeach

            <!-- Action Button For Creating Sections -->
            <button wire:click="createSection" class="max-h-28 w-80 m-2 ml-4 border-gray-600 border-2 border-dashed rounded-lg bg-gray-100 hover:bg-gray-200" :board="$board">Create Section</button>
        </div>
    </div>

    <!-- Hidden Focusable Sections -->
    @if($creatingSection) <!-- Creating Section -->
        <x-popup.focused-content :title="'Creating Section'" :closeMethodName="'stopCreating'">
            <livewire:forms.section-form :board="$board" />
        </x-popup.focused-content>
    @endif
    @if($creatingLead) <!-- Creating Lead -->
        <x-popup.focused-content :title="'Creating Lead'" :closeMethodName="'stopCreating'">
            <livewire:forms.lead-form :board="$board"/>
        </x-popup.focused-content>
    @endif
</div>
