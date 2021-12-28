<div class="flex flex-col flex-grow p-2">
    <h3 class="font-bold border-b-2 border-gray-300">Transactions</h3>

    <livewire:board.activity-center.trackers.transactions.show-balance :transactions="$transactions" />

    <livewire:board.activity-center.trackers.transactions.show-lead-transactions :transactions="$transactions" />
</div>
