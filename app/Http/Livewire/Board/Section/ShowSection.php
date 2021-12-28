<?php

namespace App\Http\Livewire\Board\Section;

use App\Models\Lead;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowSection extends Component
{
    public $board;
    public $status;

    public $editingProperties = false;
    public $listeners = ['updateSections', 'closeSection'];

    public function render()
    {
        // filter for leads tracked by this section
        $leads = $this->board->leads->filter(function ($lead) {
            foreach($lead->statuses as $collectionLabel => $statusId) {
                if (intval($statusId) === $this->status->id) { return true; }
            }

            return false;
        });

        return view('livewire.board.section.show-section', [
            'leads' => $leads
        ]);
    }

    public function editSection() { $this->editingProperties = true; }
    public function updateSections() { $this->render(); }
    public function closeSection() { $this->editingProperties = false; }
}
