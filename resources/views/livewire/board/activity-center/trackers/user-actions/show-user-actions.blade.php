<div class="flex flex-grow h-full flex-col p-2 space-y-1 overflow-y-hidden">
    <h3 class="font-bold border-b-2 border-gray-300">Activity Center</h3>
    <div class="flex flex-grow overflow-y-auto">
        <table class="flex-grow flex-col border border-black bg-gray-200 text-left">
            <tr class="border-b border-black divide-x">
                <th class="px-2 w-36">Date</th>
                <th class="px-2 w-28 border-black">User</th>
                <th class="px-2 border-black">Details</th>
            </tr>

            @foreach($userActions as $userAction)
                <livewire:board.activity-center.trackers.user-actions.show-user-action :user-action="$userAction"  :wire:key="'user_action_' . $userAction->id" />
            @endforeach

            <tr class="py-1 bg-gray-100 text-sm divide-x overflow-y-auto">
                <td class="px-2"></td>
                <td class="px-2 border-black"></td>
                <td class="px-2 border-black"></td>
            </tr>
        </table>
    </div>
</div>
