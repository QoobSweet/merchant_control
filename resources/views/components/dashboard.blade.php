<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $attributes[':pageTitle'] }}
        </h2>
    </x-slot>

    <div class="flex flex-col flex-grow bg-white m-3 rounded-lg w-full overflow-hidden">
        {{ $slot ?? '' }}
    </div>
</x-app-layout>
