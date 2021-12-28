<table class="flex-grow border border-black bg-gray-200 text-left mb-2">
    <tr class="border-b border-black divide-x">
        <th class="px-2 border-black">
            Date
        </th>
        <th class="px-2 border-black">
            Details
        </th>
        <th class="px-2 border-black text-right">
            Amt.
        </th>
    </tr>

    @foreach($transactions as $transaction)
        <tr class="py-1 bg-gray-100 text-sm divide-x text-xs">
            <td class="px-2 border-black">
                {{ $transaction->created_at->toDayDateTimeString() }}
            </td>
            <td class="px-2 border-black">
                {{ $transaction->comment }}
            </td>
            <td class="px-2 border-black text-right">
                {{ number_format($transaction->amount, 2, '.', '') }}
            </td>
        </tr>
    @endforeach
</table>
