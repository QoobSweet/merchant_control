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
                <div class="flex flex-col">
                    <!-- Left Side -->
                    <div class="flex flex-grow">
                        <div class="flex flex-col m-2 space-y-1">
                            <!-- Contact Info -->
                            <h3 class="font-bold mb-2 border-b-2 border-gray-300">Contact Info</h3>
                            <x-form.field :fieldLabel="'Lead Title'" :fieldName="'title'" :readonly="true" :inline="true" />
                            <x-form.field :fieldLabel="'Name'" :fieldName="'contact_name'" :readonly="true" :inline="true" />
                            <x-form.field :fieldLabel="'Phone'" :fieldName="'contact_phone'" :readonly="true" :inline="true" />
                        </div>

                        <div class="flex flex-col m-2 space-y-1">
                            <!-- Company Info -->
                            <h3 class="font-bold mb-2 border-b-2 border-gray-300">Company Info</h3>
                            <x-form.field :fieldLabel="'Company'" :fieldName="'company_name'" :readonly="true" :inline="true" />
                            <x-form.field :fieldLabel="'Phone'" :fieldName="'company_phone'" :readonly="true" :inline="true" />
                            <x-form.field :fieldLabel="'Website'" :fieldName="'company_website'" :readonly="true" :inline="true" />
                        </div>

                        <div class="flex flex-col m-2 space-y-1">
                            <!-- Location Info -->
                            <h3 class="font-bold mb-2 border-b-2 border-gray-300">Location Info</h3>
                            <x-form.field :fieldLabel="'Address'" :fieldName="'company_address'" :readonly="true" :inline="true" />
                            <x-form.field :fieldLabel="'City'" :fieldName="'company_city'" :readonly="true" :inline="true" />
                            <x-form.field :fieldLabel="'State'" :fieldName="'company_state'" :readonly="true" :inline="true" />
                            <x-form.field :fieldLabel="'Zip Code'" :fieldName="'company_zip_code'" :readonly="true" :inline="true" />
                            <x-form.field :fieldLabel="'Country'" :fieldName="'company_country_id'" :readonly="true" :inline="true" />
                        </div>
                    </div>

                    <!-- Right Side -->
                    <div class="flex flex-col space-y-1">
                        <h3 class="font-bold mb-2 border-b-2 border-gray-300">Activity Center</h3>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
