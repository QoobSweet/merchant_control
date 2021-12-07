<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $pageTitle }}
        </h2>
    </x-slot>

    <div class="flex flex-col flex-grow bg-white m-0 w-full overflow-x-auto">
        <div class="flex flex-grow bg-gray-200">
            {{ $slot ?? '' }}
        </div>
    </div>
</x-app-layout>
