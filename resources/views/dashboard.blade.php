<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex flex-col flex-grow bg-white m-3 rounded-lg w-full overflow-hidden">
        {{ $slot ?? '' }}
        <x-board :board="$board"></x-board>
    </div>
</x-app-layout>
