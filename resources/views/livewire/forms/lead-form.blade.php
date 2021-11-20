<x-popup.focused-content :contextTitle="'Create New Lead'" :stopFocus="'stopCreatingLead'">
    <form wire:submit.prevent="submitLead" class="flex flex-col flex-grow">
        <!-- Main Form Layout -->
        <div class="flex flex-col">
            <!-- Top Portion -->
            <div class="flex flex-row space-x-10">
                <!-- Left Side -->
                <div class="flex flex-col flex-grow space-y-5">
                    <!-- Contact Info -->
                    <div class="flex flex-col flex-grow">
                        <h3 class="font-bold mb-2 border-b-2 border-gray-300">Contact Info</h3>
                        <div class="flex flex-col">
                            <x-form.field :fieldLabel="'Lead Title'" :fieldName="'title'" :value="$title" />
                            <x-form.field :fieldLabel="'Name'" :fieldName="'contact_name'" :value="$contact_name" />
                            <x-form.field :fieldLabel="'Phone'" :fieldName="'contact_phone'" :value="$contact_phone" />
                        </div>
                    </div>
                    <!-- Company Info -->
                    <div class="flex flex-col flex-grow">
                        <h3 class="font-bold mb-2 border-b-2 border-gray-300">Company Info</h3>
                        <div class="flex flex-col">
                            <x-form.field :fieldLabel="'Company Name'" :fieldName="'company_name'" :value="$company_name" />
                            <x-form.field :fieldLabel="'Phone'" :fieldName="'company_phone'" :value="$company_phone" />
                            <x-form.field :fieldLabel="'Website'" :fieldName="'company_website'" :value="$company_website" />
                        </div>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="flex flex-col flex-grow space-y-5">
                    <!-- Location Info -->
                    <div class="flex flex-col flex-grow">
                        <h3 class="font-bold mb-2 border-b-2 border-gray-300">Location Info</h3>
                        <div class="flex flex-row flex-wrap space-x-2">
                            <x-form.field :fieldLabel="'Address'" :fieldName="'company_address'" :value="$company_address" />
                            <x-form.field :fieldLabel="'City'" :fieldName="'company_city'" :value="$company_city" />
                        </div>
                        <div class="flex flex-row flex-wrap space-x-2">
                            <x-form.field :fieldLabel="'State'" :fieldName="'company_state'" :value="$company_state" />
                            <x-form.field :fieldLabel="'Zip Code'" :fieldName="'company_zip_code'" :value="$company_zip_code" />
                        </div>
                        <div class="flex flex-row flex-wrap space-x-2">
                            <x-form.field :fieldLabel="'Country'" :fieldName="'company_country_id'" :value="$company_country_id" />
                        </div>
                    </div>

                    <!-- Status Details -->
                    <div class="flex flex-col flex-grow">
                        <h3 class="font-bold mb-2 border-b-2 border-gray-300">Lead Details</h3>
                        <!-- Lead Details -->
                        <div class="flex flex-col">
                            <div class="flex-grow">
                                <x-form.field :fieldLabel="'Lead Status'" :fieldName="'state_status_id'" :type="'select'" :options="$stateOptions" />
                            </div>
                            <div class="flex-grow">
                                <x-form.field :fieldLabel="'Lead Value'" :fieldName="'value_status_id'" :type="'select'" :options="$valueOptions" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-grow space-x-2">
            <!-- Remove Lead button if lead origin exists -->
            @if($lead)
                <button wire:click="removeLead" type="button" class="flex-grow mt-10 bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Delete</button>
            @endif

            <button type="submit" class="flex-grow mt-10 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</button>
        </div>
    </form>
</x-popup.focused-content>
