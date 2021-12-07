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
    public $listeners = ['updateSections', 'closeSection'];

    public function render()
    {
        $subscriptions = $this->section->sectionStatusSubscriptions;

        // filter for leads tracked by this section
        $leads = $this->board->leads->filter(function ($lead) use ($subscriptions) {
            foreach ($subscriptions as $subscription) {
                $subscribedStatusId = $subscription->status_id;

                foreach($lead->statuses as $collectionLabel => $id) {
                    if ($subscribedStatusId === intval($id)) { return true; }
                }
            }

            return false;
        });

        return view('livewire.board.show-section', [
            'leads' => $leads
        ]);
    }

    public function editSection() { $this->editingProperties = true; }
    public function updateSections() { $this->render(); }
    public function closeSection() { $this->editingProperties = false; }
}
