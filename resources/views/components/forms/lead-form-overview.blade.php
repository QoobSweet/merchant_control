<!-- Form Content -->
<div class="flex-grow mt-2 p-2 bg-gray-100">
    <div class="flex flex-grow min-w-50">
        <form wire:submit.prevent="submitLead" class="flex flex-col flex-grow">
            <!-- Main Form Layout -->
            <div class="flex flex-col">
                <!-- Top Portion -->
                <div class="flex flex-row space-x-10">
                    <!-- Left Side -->
                    <div class=" w-1/2 flex flex-col space-y-1">
                        <!-- Contact Info -->
                        <h3 class="font-bold mb-2 border-b-2 border-gray-300">Contact Info</h3>
                        <x-form.field :fieldLabel="'Lead Title'" :fieldName="'title'" :readonly="true"/>
                        <x-form.field :fieldLabel="'Name'" :fieldName="'contact_name'" :readonly="true"/>
                        <x-form.field :fieldLabel="'Phone'" :fieldName="'contact_phone'" :readonly="true"/>

                        <!-- Company Info -->
                        <h3 class="mt-5 font-bold mb-2 border-b-2 border-gray-300">Company Info</h3>
                        <x-form.field :fieldLabel="'Company Name'" :fieldName="'company_name'" :readonly="true"/>
                        <x-form.field :fieldLabel="'Phone'" :fieldName="'company_phone'" :readonly="true"/>
                        <x-form.field :fieldLabel="'Website'" :fieldName="'company_website'" :readonly="true"/>

                        <!-- Location Info -->
                        <h3 class="mt-5 font-bold mb-2 border-b-2 border-gray-300">Location Info</h3>
                        <x-form.field :fieldLabel="'Address'" :fieldName="'company_address'" :readonly="true"/>
                        <x-form.field :fieldLabel="'City'" :fieldName="'company_city'" :readonly="true"/>
                        <x-form.field :fieldLabel="'State'" :fieldName="'company_state'" :readonly="true"/>
                        <x-form.field :fieldLabel="'Zip Code'" :fieldName="'company_zip_code'" :readonly="true"/>
                        <x-form.field :fieldLabel="'Country'" :fieldName="'company_country_id'" :readonly="true"/>
                    </div>

                    <!-- Right Side -->
                    <div class="w-1/2 flex flex-col space-y-1">
                        <h3 class="font-bold mb-2 border-b-2 border-gray-300">Activity Center</h3>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
