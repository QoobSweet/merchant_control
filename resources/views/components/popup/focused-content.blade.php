<div>
    <div wire:click.self="$emit('stopFocusing')" class="flex flex-col absolute inset-0 bg-gray-800 bg-opacity-50">
        <div class="flex flex-row flex-grow m-auto">
            <div class="flex-grow max-w-6xl p-2 m-auto bg-white rounded-lg">
                <!-- Header -->
                <div class="p-2 border-b font-bold">
                    <h2>{{ $contextTitle }}</h2>
                </div>
                <!-- Form Content -->
                <div class="flex-grow mt-2 p-2 bg-gray-100">
                    <div class="flex flex-grow min-w-50">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
