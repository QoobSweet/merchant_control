<div class="flex-grow bg-gray-50">
    @if(isset($creating) && $creating === true)
        <!-- Add New Collection -->
            <x-form.wrapper :action="'submitStatus'">
                <x-form.field :placeholder="'Status Title'" :fieldLabel="'Label'" :fieldName="'label'" :inline="true" />
                <x-form.field :fieldLabel="'Collection'" :fieldName="'selectedCollectionId'" :type="'select'" :options="$availableCollections" :inline="true" :showLabel="true"/>
                <x-form.field :fieldLabel="'Color'" :fieldName="'selectedColorId'" :type="'select'" :options="$availableColors" :inline="true" :showLabel="true"/>
                <x-form.button.button :type="'submit'" :label="'Create'" />
            </x-form.wrapper>
    @else
        <!-- Form Content -->
        <div class="flex-grow mt-2 p-2 bg-gray-50">
            <div class="flex flex-grow min-w-50">
                <form wire:submit.prevent="submitStatus" class="flex flex-grow flex-col">
                    <x-form.field-wrapper :tight="true">
                        <x-form.field :fieldLabel="'Label'" :fieldName="'label'" />
                        <x-form.field :fieldLabel="'Collection'" :fieldName="'selectedCollectionId'" :type="'select'" :options="$availableCollections" />
                        <x-form.field :fieldLabel="'Color'" :fieldName="'selectedColorId'" :type="'select'" :options="$availableColors" />
                    </x-form.field-wrapper>

                    <div class="flex flex-grow flex-col space-y-2">
                        <!-- Remove Lead button if lead origin exists -->
                        <x-form.button.wrapper>
                            @if(isset($status))
                                <x-form.button.button :clickAction="'removeStatus'" :type="'button'" :label="'Delete'" :backgroundColor="'red'"/>
                            @endif

                            <x-form.button.button :type="'submit'" :label="'Save'"/>
                        </x-form.button.wrapper>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
