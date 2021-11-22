<li class="flex m-1 hover:bg-gray-100">
    <div class="flex-grow cursor-default">
        {{ $status->label }}
    </div>
    <x-svg.edit-pen :action="'editStatus'" />
    <x-svg.exit-delete :action="'deleteStatus'" />
</li>
