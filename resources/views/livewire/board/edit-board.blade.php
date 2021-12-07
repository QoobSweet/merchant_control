<div id="full-content-wrapper" class="flex flex-col flex-grow bg-gray-400">
    <!-- Main Content -->
    <div id="board-content" class="flex flex-col flex-grow">
        <!-- Header -->
        <div id="board-header" class="flex flex-grow max-h-10 bg-blue-500 text-white">
            <div class="my-auto inline-flex">
                <h1 class="flex h-full my-auto mx-4 text-center">{{ ucfirst($board->title) }}</h1>
                <x-svg.edit-pen />
            </div>
        </div>

        <div class="flex flex-grow flex-row flex-nowrap overflow-x-auto">
            <x-board.column-wrapper :title="'Modify Status Collections'" :description="'Create and assign status\'s to a collection and modify its tag-color.'" :id="2">
                <div class="flex flex-col m-2 p-2 bg-white rounded-md">
                    <h2 class="font-bold m-auto underline">Available Collections</h2>
                    <ul class="m-1 p-1 space-y-2">
                        @foreach($board->statusCollections as $collection)
                            <livewire:board.status-collection.show-collection :board="$board" :collection="$collection" :wire:key="'collection_'.$collection->id" />
                        @endforeach
                    </ul>
                </div>
                <div class="flex flex-col flex-grow m-2 p-2 bg-white rounded-md">
                    <h2 class="font-bold m-auto underline">Create New Status Collection</h2>
                    <livewire:forms.status-collection-form :board="$board" :creating="true"/>
                </div>
            </x-board.column-wrapper>

            <x-board.column-wrapper :title="'Modify Status\'s'" :description="'Create and assign status\'s to a collection and modify its tag-color.'" :id="2">
                <div class="flex flex-col m-2 p-2 bg-white rounded-md">
                    <h2 class="font-bold m-auto underline">Available Status's</h2>
                    <ul class="m-2 p-2 space-y-1">
                        @foreach($board->statusCollections as $collection)
                            @if(count($collection->statuses) > 0)
                                <li>
                                    <h2 class="font-bold underline">{{ ucfirst($collection->label) }}</h2>
                                    <ul class="ml-2">
                                    @foreach($collection->statuses as $status)
                                        <livewire:board.status.show-status :board="$board" :status="$status" :wire:key="'status_'.$status->id" />
                                    @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="flex flex-col flex-grow m-2 p-2 bg-white rounded-md">
                    <h2 class="font-bold m-auto underline">Create New Status</h2>
                    <livewire:forms.status-form :board="$board" :creating="true"/>
                </div>
            </x-board.column-wrapper>

            <x-board.column-wrapper :title="'Permission Settings'" :description="'Make board private, or create a team and choose user emails to allow access to.'" :id="3">

            </x-board.column-wrapper>

            <x-board.column-wrapper :title="'General Settings'" :description="'Edit general display and format settings.'" :id="3">

            </x-board.column-wrapper>
        </div>
    </div>
</div>
