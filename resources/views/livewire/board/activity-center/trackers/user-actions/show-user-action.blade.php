<tr class="py-1 bg-gray-100 text-sm divide-x text-xs border-b border-gray-300">
    <td class="px-2">{{ $userAction->getCreatedDateString() }}</td>
    <td class="px-2 border-black">{{ $userAction->user->name }}</td>
    <td wire:click="viewChanges" class="whitespace-nowrap px-2 border-black">
        <p class="text-xs">
            <b class="text-sm">Changed:</b>
            @foreach($userAction->getModelDiff() as $diffKey => $diffDetails)
                {{ ucfirst($diffKey) }},
            @endforeach
        </p>
    </td>
</tr>

