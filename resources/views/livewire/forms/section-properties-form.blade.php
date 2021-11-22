<x-popup.focused-content :contextTitle="'Edit Section'">
    <form wire:submit.prevent="submitSection" class="flex flex-col">
        <div class="flex flex-col">
            <div class="flex-grow w-50">
                <div class="flex-grow-2">
                    <x-form.field :fieldLabel="'Title'" :fieldName="'title'" />
                </div>
            </div>
        </div>

        <button type="submit" class="mt-10 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save Section</button>
    </form>
</x-popup.focused-content>
