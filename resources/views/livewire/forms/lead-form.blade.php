<div class="flex-grow p-2 max-w-10/12 bg-gray-100 rounded-md">
    @if($editingProperties)
        <x-forms.lead-form-content :board="$board" :lead="$lead" :stateOptions="$stateOptions" :valueOptions="$valueOptions"/>
    @else
        <x-forms.lead-form-overview :board="$board" :lead="$lead" :stateOptions="$stateOptions" :valueOptions="$valueOptions"/>
    @endif
</div>
