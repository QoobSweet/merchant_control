<!-- Form Content -->
<div class="flex-grow mt-2 p-2 bg-gray-100">
    <div class="flex flex-grow min-w-50">
        <form wire:submit.prevent="submitStatus" class="flex flex-col">
            <div class="flex flex-col">
                <x-form.field :fieldLabel="'Label'" :fieldName="'label'" />
            </div>

            <div class="flex flex-grow flex-col space-y-2">
                <!-- Remove Lead button if lead origin exists -->
                <div class="flex flex-grow space-x-2">
                    @if(isset($status))
                        <x-form.button :clickAction="'removeStatus'" :type="'button'" :label="'Delete'" :backgroundColor="'red'"/>
                    @endif

                    <x-form.button :type="'submit'" :label="'Save'"/>
                </div>
            </div>
        </form>
    </div>
</div>
