<x-popup.focused-content>
    <div class="z-10 flex-grow p-2 m-10 mr-0 max-w-10/12 bg-white rounded-md">
        <!-- Header -->
        <div class="p-2 border-b font-bold">
            <h2>New Section</h2>
        </div>
        <!-- Form Content -->
        <div class="flex-grow mt-2 p-2 bg-gray-100">
            <div class="flex flex-grow min-w-50">
                <!-- Right Side Drawer -->
                <div wire:click="" class="flex z-0 my-11 -ml-5 w-14 bg-gray-300 hover:bg-gray-400 rounded-r-md">
                    <h1 class="mr-2 m-auto rotate-90 font-bold">Activity Overview</h1>
                </div>
                <form wire:submit.prevent="submitSection" class="flex flex-col">
                    <div class="flex flex-col">
                        <x-form.field :fieldLabel="'Title'" :fieldName="'title'" />
                        <x-form.field :fieldLabel="'Tracked Lead Status'" :fieldName="'selected_state_id'" :type="'select'" :options="$statusOptions" />
                    </div>

                    <div class="flex flex-grow flex-col space-x-2">
                        <!-- Remove Lead button if lead origin exists -->
                        <div class="flex-grow">
                            @if($section)
                                <button wire:click="removeSection" type="button" class="flex-grow mt-10 bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Delete</button>
                            @endif

                            <button wire:loading.delay.longest.remove type="submit" class="flex-grow mt-10 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</button>
                        </div>
                        <div wire:loading.delay.longest class="flex-grow">
                            Saving...
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Right Side Drawer -->
    <div wire:click="" class="flex z-0 my-11 -ml-5 w-14 bg-gray-300 hover:bg-gray-400 rounded-r-md">
        <h1 class="mr-2 m-auto rotate-90 font-bold">Activity Overview</h1>
    </div>
    <form wire:submit.prevent="submitSection" class="flex flex-col">
        <div class="flex flex-col">
            <x-form.field :fieldLabel="'Title'" :fieldName="'title'" />
            <x-form.field :fieldLabel="'Tracked Lead Status'" :fieldName="'selected_state_id'" :type="'select'" :options="$statusOptions" />
        </div>

        <div class="flex flex-grow flex-col space-x-2">
            <!-- Remove Lead button if lead origin exists -->
            <div class="flex-grow">
                @if($section)
                    <button wire:click="removeSection" type="button" class="flex-grow mt-10 bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Delete</button>
                @endif

                <button wire:loading.delay.longest.remove type="submit" class="flex-grow mt-10 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</button>
            </div>
            <div wire:loading.delay.longest class="flex-grow">
                Saving...
            </div>
        </div>
    </form>
</x-popup.focused-content>
