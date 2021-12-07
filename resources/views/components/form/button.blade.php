<button
    type="{{ $type }}"
    wire:click="{{ $clickAction ?? '' }}"
    class="flex-grow bg-{{ $backgroundColor ?? 'blue' }}-500 py-2 px-4 rounded
        text-{{ $textColor ?? 'white' }} font-bold
        hover:bg-{{ $backgroundColor ?? 'blue' }}-700
        focus:outline-none focus:shadow-outline ml-auto
        {{ isset($small) && $small == true ? 'w-1/2 float-right mt-2 text-sm' : 'mt-10' }}"
>
    {{ $label }}
</button>
