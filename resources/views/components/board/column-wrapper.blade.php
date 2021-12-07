<div class="my-2 ml-4">
    <div class="flex flex-col w-80 p-2 bg-gray-200 rounded-lg" >
        <!-- Header -->
        <div id="column_{{ $id ?? 'unset' }}_title" class="flex flex-grow p-1">
            <h2 class="flex-grow ml-3 text-black text-center font-bold">{{ ucfirst($title) }}</h2>

            @if(isset($description))
                <x-svg.question-mark-circle :message="$description"/>
            @endif

            @if(isset($menuActionName))
                <div  wire:click="{{ $menuActionName }}" class="float-right hover:bg-gray-300 ml-2">
                    <x-svg.menubar />
                </div>
            @endif
        </div>

        {{ $slot ?? '' }}
    </div>
</div>
