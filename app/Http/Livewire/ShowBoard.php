<?php

namespace App\Http\Livewire;

use App\Models\Board;
use App\Models\Lead;
use App\Models\Section;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use MongoDB\Driver\Session;
use function Psy\debug;

class ShowBoard extends Component
{
    public $board;

    public $creatingSection = false;
    public $creatingLead = false;

    public $editingSection = false;
    public $editingLead = false;
    public $activeSection;
    public $activeLead;

    protected $listeners = ['updateSections','createSection', 'editSection', 'createLead', 'editLead', 'stopFocusing'];

    public function render()
    {
        $this->board = $this->board->fresh();

        return view('livewire.show-board', [
            'sections' => $this->board->sections,
            'leads' => $this->board->leads
        ]);
    }

    public function updateSections()
    {
        $this->render();
    }

    public function createSection()
    {
        $this->creatingSection = true;
    }

    public function editSection()
    {
        $this->editingSection = true;
    }

    public function createLead()
    {
        $this->creatingLead = true;
    }

    public function editLead($lead)
    {
        $this->activeLead = Lead::find($lead['id']);
        $this->editingLead = true;
    }

    public function stopFocusing()
    {
        $this->creatingSection = false;
        $this->editingSection = false;
        $this->creatingLead = false;
        $this->editingLead = false;

        $this->activeLead = null;
        $this->activeSection = null;
        $this->render();
    }
}
