<div>
    <div wire:click.self="$emit('stopFocusing')" class="flex flex-col absolute inset-0 bg-gray-800 bg-opacity-50">
        <div class="flex flex-col flex-grow m-auto">
            <div class="flex flex-row flex-nowrap bg-gray-400 rounded-md m-auto">
                {{ $slot  }}
            </div>
        </div>
    </div>
</div>
