<!-- Form Content -->
<div class="flex-grow mt-2 p-2 bg-gray-100">
    <div class="flex flex-grow min-w-50">
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

                    <button type="submit" class="flex-grow mt-10 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
