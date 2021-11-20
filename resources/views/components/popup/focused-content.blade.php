<div>
    <div wire:click.self="$emit('stopFocusing')" class="flex flex-col absolute inset-0 bg-gray-800 bg-opacity-50">
        <div class="flex flex-row flex-grow">
            <!-- Primary Window -->
            <div class="flex m-auto flex-grow  max-w-3xl">
                {{ $slot }}
            </div>

        </div>
    </div>
</div>
