<?php

namespace App\Http\Livewire\Board\ActivityCenter\Trackers\Transactions;

use Livewire\Component;

class ShowOverview extends Component
{
    public $transactions;

    public function render()
    {
        return view('livewire.board.activity-center.trackers.transactions.show-overview');
    }
}
