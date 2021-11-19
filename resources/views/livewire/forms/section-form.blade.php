<x-popup.focused-content :contextTitle="'New Section'">
    <form wire:submit.prevent="submitSection" class="flex flex-col">
        <div class="flex flex-col">
            <x-form.field :fieldLabel="'Title'" :fieldName="'title'" />
            <x-form.field :fieldLabel="'Tracked Lead Status'" :fieldName="'selected_state_id'" :type="'select'" :options="$statusOptions" />
        </div>

        <button type="submit" class="mt-10 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save Section</button>
    </form>
</x-popup.focused-content>
