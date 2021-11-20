<?php

namespace App\Http\Livewire\Board\Lead;

use Livewire\Component;

class ShowLead extends Component
{
    public $board;
    public $lead;

    public $editingProperties = false;

    protected $listeners = ['updateLeads', 'stopFocusing'];

    public function render()
    {
        return view('livewire.board.lead.show-lead');
    }
    public function updateLeads() { $this->lead = $this->lead->fresh(); }

    public function editLead() { $this->editingProperties = true; }
    public function stopFocusing() { $this->editingProperties = false; }
}
