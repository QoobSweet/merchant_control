<!-- Form Content -->
<div class="flex-grow m-1 p-1 bg-gray-100">
    <div class="flex flex-grow min-w-50">
        <form wire:submit.prevent="submitLead" class="flex flex-col flex-grow">
            <!-- Main Form Layout -->
            <div class="flex flex-col">
                <div class="flex flex-row max-w-7xl flex-wrap">
                    <!-- Fields -->
                    <div class="flex flex-grow flex-col">
                        <x-forms.lead-form-content :board="$board" :lead="$lead" :readonly="$readonly ?? false"/>
                    </div>
                </div>

                <livewire:board.activity-center.trackers.transactions.show-overview :transactions="$transactions"/>

                <!-- Activity Center -->
                <livewire:board.activity-center.trackers.user-actions.show-user-actions :userActions="$userActions" />
            </div>
        </form>
    </div>
</div>
