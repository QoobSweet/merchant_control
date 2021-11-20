<?php

namespace App\Http\Livewire\Board;

use App\Models\Lead;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowSection extends Component
{
    public $board;
    public $section;

    public $editingProperties = false;

    protected $listeners = ['updateSections', 'stopFocusing'];

    public function render()
    {
        // filter for leads tracked by this section
        $leads = $this->board->leads->filter(function ($lead) {
            $statusIds = $this->section->getStatusIds();
            $matchingState = in_array($lead->state_status_id, $statusIds);
            $matchingValue = in_array($lead->value_status_id, $statusIds);
            return $matchingState || $matchingValue;
        });

        return view('livewire.board.show-section', [
            'leads' => $leads
        ]);
    }
    public function updateSections() { $this->section = $this->section->fresh(); }

    public function editSection() { $this->editingProperties = true; }
    public function stopFocusing() { $this->editingProperties = false; }
}
