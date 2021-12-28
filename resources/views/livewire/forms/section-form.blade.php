<div class="flex-grow mt-2 p-2 bg-gray-50">
    <!-- Form Content -->
    <div class="flex flex-grow min-w-50">
        <form wire:submit.prevent="submitSection" class="flex flex-col">
            <x-form.field-wrapper>
                <x-form.field :fieldLabel="'Title'" :fieldName="'title'" :inline="true"/>
            </x-form.field-wrapper>

            <div class="flex flex-col flex-grow mt-5 mb-2">
                <h2 class="font-bold text-">Tracked Status's:</h2>
                <ul class="bg-white space-y-1 text-base">
                    @foreach($selectedStatuses as $status)
                        <li class="p-1" :wire:key="'selected_status_'.$status->id" >{{ $status['label'] }}</li>
                    @endforeach

                    <li class="p-4 pl-6 text-xs" :wire:key="'selected_status_'.$status->id" >Select and Add status below to make <br/> Section list all associated Leads</li>
                </ul>
            </div>

            <x-form.field-wrapper>
                <x-form.field :showLabel="false" :fieldLabel="'Available Status\'s'" :fieldName="'selectedStatusId'" :type="'select'" :options="$statusOptions" />
                <x-form.button.button :type="'button'" :clickAction="'addTrackedStatus'" :label="'Add'" :small="true" />
            </x-form.field-wrapper>

            <div class="flex flex-grow flex-col space-y-2">
                <!-- Remove Lead button if lead origin exists -->
                <div class="flex flex-grow space-x-2">
                    @if($section)
                        <x-form.button.button :clickAction="'removeSection'" :type="'button'" :label="'Delete'" :backgroundColor="'red'"/>
                    @endif

                    <x-form.button.button :type="'submit'" :label="'Save'" />
                </div>
            </div>
        </form>
    </div>
</div>
