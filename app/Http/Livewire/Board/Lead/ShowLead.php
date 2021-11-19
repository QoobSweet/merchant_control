<?php

namespace App\Http\Livewire\Board\Lead;

use Livewire\Component;

class ShowLead extends Component
{
    public $lead;

    public function render()
    {
        return view('livewire.board.lead.show-lead');
    }
}
