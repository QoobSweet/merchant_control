<label
    class="flex-grow text-left text-sm font-bold {{ isset($inline) && $inline === true ? 'flex-grow w-1/2' : '' }} whitespace-nowrap"
    for="{{ $name }}"
>
        {{ $value }}:
</label>
