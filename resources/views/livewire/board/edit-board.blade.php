<div id="full-content-wrapper" class="flex flex-col flex-grow bg-gray-400">
    <!-- Main Content -->
    <div id="board-content" class="flex flex-col flex-grow p-1">
        <!-- Header -->
        <div id="board-header" class="flex flex-grow max-h-10 bg-gray-700 text-white">
            <div class="my-auto inline-flex">
                <h1 class="flex h-full my-auto mx-4 text-center">{{ ucfirst($board->title) }}</h1>
                <x-svg.edit-pen />
            </div>
        </div>

        <div class="flex flex-grow flex-row flex-wrap">
            <x-board.column-wrapper :title="'Status\'s'" :description="'Create and assign status\'s to a collection and modify its tag-color.'" :id="2">
                <div class="m-2 bg-white rounded-md">
                    <ul class="m-2 p-2 bg-gray-100 h-32">
                        @foreach($board->statusCollections[0]->statuses as $status)
                            <livewire:board.status.show-status :board="$board" :status="$status" :wire:key="$status->id" />
                        @endforeach
                    </ul>

                    <!-- Add New Status -->
                    <div class="mt-10 p-3">
                        <x-form.wrapper :action="'submitStatus'">
                            <x-form.field :fieldLabel="'New Status'" :fieldName="'statusField'"/>
                            <x-form.button :type="'submit'" :label="'Create Status'" />
                        </x-form.wrapper>
                    </div>
                </div>
            </x-board.column-wrapper>

            <x-board.column-wrapper :title="'Permission Settings'" :description="'Make board private, or create a team and choose user emails to allow access to.'" :id="3">

            </x-board.column-wrapper>

            <x-board.column-wrapper :title="'General Settings'" :description="'Edit general display and format settings.'" :id="3">

            </x-board.column-wrapper>
        </div>
    </div>
</div>
