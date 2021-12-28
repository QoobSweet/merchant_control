<div id="full-content-wrapper" class="flex flex-col flex-grow bg-gray-400">
    <!-- Main Content -->
    <div id="board-content" class="flex flex-col flex-grow p-1">
        <!-- Header -->
        <div id="board-header" class="flex flex-grow max-h-10 bg-gray-800">
            <h1 class="m-auto text-white text-center">Board Title</h1>
        </div>

        <div class="flex flex-grow flex-row flex-wrap">
            @foreach($board->statuses as $status)
                <livewire:board.section.show-section :board="$board" :status="$status" :wire:key="'status_' . $status->id" />
            @endforeach

            <!-- Action Button For Creating Sections -->
{{--            <button wire:click="createSection" class="max-h-28 w-80 m-2 ml-4 border-gray-600 border-2 border-dashed rounded-lg bg-gray-100 hover:bg-gray-200" :board="$board">Create Section</button>--}}
        </div>

        <div class="fixed-bottom bg-blue-300">

        </div>
    </div>

    <!-- Activity feed -->
    <div id="activity-feed" class="flex flex-wrap max-h-56 h-1/4 overscroll-y-hidden bg-blue-100 border-t border-gray-500">
        <div class="w-1/3 h-full border-l-4 border-ridge border-gray-400">
            <livewire:board.activity-center.trackers.user-actions.show-user-actions :userActions="$board->userActions" />
        </div>
        <div class="w-1/3 h-full border-l-4 border-ridge border-garay-400">

        </div>
        <div class="w-1/3 h-full border-l-4 border-ridge border-gray-400">

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
            <livewire:board.lead.lead-form :board="$board" />
        </x-popup.focused-content>
    @endif
</div>
