<!-- Form Content -->
<div class="flex-grow bg-gray-100">
    <div class="flex flex-grow flex-col min-w-50">
        <form wire:submit.prevent="submitLead" class="flex flex-col flex-grow">
            <!-- Main Form Layout -->
            <div class="flex flex-col">
                <!-- Top Portion -->
                <div class="flex flex-wrap">
                    <!-- Left Side -->
                    <div class="flex flex-col m-2 max-w-xs flex-grow space-y-5">
                        <!-- Status Details -->
                        <div class="flex flex-col flex-grow max-w-xs">
                            <h3 class="font-bold mb-2 border-b-2 border-gray-300">Lead Details</h3>
                            <!-- Lead Details -->
                            <div class="flex flex-grow flex-col">
                                <x-form.field :fieldLabel="'Lead Title'" :fieldName="'title'" :readonly="$readonly ?? false" :inline="true" />
                                @foreach($board->statusCollections as $collection)
                                    <x-form.field :fieldLabel="$collection->label" :fieldName="'statuses.'.$collection->label" :type="'select'" :options="$collection->statuses" :inline="true"  :readonly="$readonly ?? false"/>
                                @endforeach
                            </div>
                        </div>
                        <!-- Contact Info -->
                        <div class="flex flex-col flex-grow">
                            <h3 class="font-bold mb-2 border-b-2 border-gray-300">Contact Info</h3>
                            <div class="flex flex-col">
                                <x-form.field :fieldLabel="'Name'" :fieldName="'contact_name'" :readonly="$readonly ?? false" :inline="true" />
                                <x-form.field :fieldLabel="'Phone'" :fieldName="'contact_phone'" :readonly="$readonly ?? false" :inline="true" />
                            </div>
                        </div>
                    </div>

                    <!-- Right Side -->
                    <div class="flex flex-grow flex-col m-2 w-80 max-w-md flex-grow space-y-5">
                        <!-- Company Info -->
                        <div class="flex flex-col flex-grow mt-2">
                            <h3 class="font-bold mb-2 border-b-2 border-gray-300">Company Info</h3>
                            <div class="flex flex-col">
                                <x-form.field :fieldLabel="'Company Name'" :fieldName="'company_name'" :readonly="$readonly ?? false" :inline="true" />
                                <x-form.field :fieldLabel="'Phone'" :fieldName="'company_phone'" :readonly="$readonly ?? false" :inline="true" />
                                <x-form.field :fieldLabel="'Website'" :fieldName="'company_website'" :readonly="$readonly ?? false" :inline="true" />
                            </div>
                        </div>
                        <!-- Location Info -->
                        <div class="flex flex-grow flex-col flex-grow w-50">
                            <h3 class="font-bold mb-2 border-b-2 border-gray-300">Location Info</h3>
                            <div class="flex flex-col">
                                <x-form.field :fieldLabel="'Address'" :fieldName="'company_address'" :readonly="$readonly ?? false" :inline="true" />
                                <x-form.field :fieldLabel="'City'" :fieldName="'company_city'" :readonly="$readonly ?? false" :inline="true" />
                                <x-form.field :fieldLabel="'State'" :fieldName="'company_state'" :readonly="$readonly ?? false" :inline="true" />
                                <x-form.field :fieldLabel="'Zip Code'" :fieldName="'company_zip_code'" :readonly="$readonly ?? false" :inline="true" />
                                <x-form.field :fieldLabel="'Country'" :fieldName="'company_country_id'" :readonly="$readonly ?? false" :inline="true" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            @if($readonly ?? false)
                <x-form.button.wrapper>
                    <x-form.button.button :type="'button'" :clickAction="'editLead'"  :label="'Edit'" :small="true" />
                </x-form.button.wrapper>
            @else
                <x-form.button.wrapper>
                    @if(isset($lead))
                        <x-form.button.button :type="'button'" :clickAction="'removeLead'" :label="'Remove'" :backgroundColor="'red'" :small="true" />
                    @endif
                    <x-form.button.button :type="'submit'" :label="'Save'" :small="true" />
                </x-form.button.wrapper>
            @endif
        </form>
    </div>
</div>
