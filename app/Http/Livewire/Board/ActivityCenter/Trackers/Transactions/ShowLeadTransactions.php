<?php

namespace App\Http\Livewire\Board\ActivityCenter\Trackers\Transactions;

use Livewire\Component;

class ShowLeadTransactions extends Component
{
    public $transactions;
    public $paidToDate = 0;
    public $profitToDate = 0;
    public $balance = 0;


    public function render()
    {
        return view('livewire.board.activity-center.trackers.transactions.show-lead-transactions');
    }
}
