<button
    type="{{ $type }}"
    wire:click="{{ $clickAction ?? '' }}"
    class="flex-grow mt-10 bg-{{ $backgroundColor ?? 'blue' }}-500 py-2 px-4 rounded
        text-{{ $textColor ?? 'white' }} font-bold
        hover:bg-{{ $backgroundColor ?? 'blue' }}-700
        focus:outline-none focus:shadow-outline"
>
    {{ $label }}
</button>
