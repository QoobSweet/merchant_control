<div class="flex-grow bg-gray-100">
    @if((isset($creating) && $creating = true))
        <!-- Add New Collection -->
        <x-form.wrapper :action="'submitCollection'">
            <x-form.field :placeholder="'New Collection'" :fieldLabel="'Label'" :fieldName="'label'" :showLabel="false"/>
            <x-form.button.button :type="'submit'" :label="'Create'" />
        </x-form.wrapper>
    @else
        <!-- Form Content -->
        <div class="flex flex-grow mt-2 p-2 bg-gray-100">
            <div class="flex flex-grow min-w-50">
                <form wire:submit.prevent="submitCollection" class="flex flex-grow flex-col">
                    <div class="flex flex-grow">
                        <x-form.field :fieldLabel="'Label'" :fieldName="'label'" />
                    </div>

                    <div class="flex flex-grow flex-col space-y-2">
                        <!-- Remove Lead button if lead origin exists -->
                        <x-form.button.wrapper>
                            @if(isset($collection))
                                <x-form.button.button :clickAction="'removeCollection'" :type="'button'" :label="'Delete'" :backgroundColor="'red'"/>
                            @endif

                            <x-form.button.button :type="'submit'" :label="'Save'"/>
                        </x-form.button.wrapper>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>

