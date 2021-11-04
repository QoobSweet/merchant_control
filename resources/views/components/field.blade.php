<!-- Requires $label & $value be supplied-->
@if ($label)
    <div class="flex px-1">
        <div class="w-1/2">
            <label class="text-sm">{{ $label }}:</label>
        </div>
        <div class="w-1/2 pl-1 text-right">
            <label class="text-xs">
                {{ $value ? $value : '' }}
            </label>
        </div>
    </div>
@endif
