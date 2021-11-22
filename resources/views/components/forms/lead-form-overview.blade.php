<!-- Form Content -->
<div class="flex-grow m-1 p-1 bg-gray-100">
    <div class="flex flex-row mx-5 mb-2 rounded-full bg-white align-middle space-x-2">
        <div wire:click="toggleLeadDisplayCard" class="flex flex-grow py-1 px-3 hover:bg-blue-100 rounded-full text-center cursor-pointer">
            <a class="flex-grow m-auto text-xs text-blue-400 hover:text-black ">Edit</a>
        </div>
    </div>
    <div class="flex flex-grow min-w-50">
        <form wire:submit.prevent="submitLead" class="flex flex-col flex-grow">
            <!-- Main Form Layout -->
            <div class="flex flex-col">
                <!-- Top Portion -->
                <div class="flex flex-row space-x-10">
                    <!-- Left Side -->
                    <div class="flex flex-col w-1/2 space-y-2">
                        <div class="flex flex-col space-y-0">
                            <!-- Contact Info -->
                            <h3 class="font-bold mb-2 border-b-2 border-gray-300">Contact Info</h3>
                            <x-form.field :fieldLabel="'Lead Title'" :fieldName="'title'" :readonly="true"/>
                            <x-form.field :fieldLabel="'Name'" :fieldName="'contact_name'" :readonly="true"/>
                            <x-form.field :fieldLabel="'Phone'" :fieldName="'contact_phone'" :readonly="true"/>
                        </div>

                        <div class="flex flex-col space-y-0">
                            <!-- Company Info -->
                            <h3 class="font-bold mb-2 border-b-2 border-gray-300">Company Info</h3>
                            <x-form.field :fieldLabel="'Company'" :fieldName="'company_name'" :readonly="true"/>
                            <x-form.field :fieldLabel="'Phone'" :fieldName="'company_phone'" :readonly="true"/>
                            <x-form.field :fieldLabel="'Website'" :fieldName="'company_website'" :readonly="true"/>
                        </div>

                        <div class="flex flex-col space-y-0">
                            <!-- Location Info -->
                            <h3 class="font-bold mb-2 border-b-2 border-gray-300">Location Info</h3>
                            <x-form.field :fieldLabel="'Address'" :fieldName="'company_address'" :readonly="true"/>
                            <x-form.field :fieldLabel="'City'" :fieldName="'company_city'" :readonly="true"/>
                            <x-form.field :fieldLabel="'State'" :fieldName="'company_state'" :readonly="true"/>
                            <x-form.field :fieldLabel="'Zip Code'" :fieldName="'company_zip_code'" :readonly="true"/>
                            <x-form.field :fieldLabel="'Country'" :fieldName="'company_country_id'" :readonly="true"/>
                        </div>
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
