<?php

namespace App\Http\Livewire\Board\Lead;

use Livewire\Component;

class ShowLead extends Component
{
    public $board;
    public $lead;

    public $editingProperties = false;

    public function render()
    {
        return view('livewire.board.lead.show-lead');
    }

    public function editLead() { $this->editingProperties = true; }
    public function closeLead() { $this->editingProperties = false; }
}
