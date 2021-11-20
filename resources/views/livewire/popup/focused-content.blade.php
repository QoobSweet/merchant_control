<div class="flex flex-row absolute inset-0 bg-gray-800 bg-opacity-50">
    <div wire:click="$emit('clearPopupContext')" class="p-2 m-auto bg-white">
        <!-- Header -->
        <div class="p-2 border-b">
            <h2>{{ $contextTitle }}</h2>
        </div>
        <!-- Form Content -->
        <div class="flex-grow mt-2 p-2 bg-gray-100">
            <div class="max-w-xl">
                @slot()
{{--                <livewire:forms.lead />--}}
            </div>
        </div>
    </div>
</div>
