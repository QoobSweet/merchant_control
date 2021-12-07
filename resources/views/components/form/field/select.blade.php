<select class="text-sm shadow appearance-none border rounded w-full py-1 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        wire:model="{{ isset($modelArray) ? $modelArray . '.' : '' }}{{ $fieldName }}"
        name="{{ $name }}"
        title="Select . {{ $label }}"
        {{ $disabled ? 'disabled' : '' }}
>

    <option value=''>{{ $label }}...</option>
    @foreach($options as $option)
        <option value={{ $option->id }}>{{ $option->label ?? $option->name }}</option>
    @endforeach
</select>
