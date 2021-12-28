<select class="w-1/2 flex-grow text-right px-10 text-sm shadow appearance-none border rounded w-full py-1 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
        wire:model="{{ isset($modelArray) ? $modelArray . '.' : '' }}{{ $fieldName }}"
        name="{{ $name }}"
        title="Select . {{ $label }}"
        {{isset($disabled) && $disabled === true ? 'disabled' : '' }}
>

    <option value=0>{{ $label }}...</option>
    @foreach($options as $option)
        <option value={{ $option->id }}>{{ $option->label ?? $option->name }}</option>
    @endforeach
</select>
