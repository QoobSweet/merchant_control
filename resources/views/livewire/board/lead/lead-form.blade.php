<div class="flex-grow max-w-10/12 bg-gray-100 rounded-md">
    @if(!isset($lead))
        <x-forms.lead-form-content :board="$board" />
    @else
        <x-forms.lead-form-overview :board="$board" :lead="$lead" :transactions="$lead->transactions" :userActions="$lead->userActions" :readonly="!$editing"/>
    @endif
</div>
