<?php

namespace App\Http\Livewire\Board;

use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowSection extends Component
{
    public $section;
    public $leads;

    public function mount(SessionManager $session)
    {
        $this->section = $this->section->fresh();
        $this->leads = $this->section->leads;
    }

    public function render()
    {
        $this->section = $this->section->fresh();
        $this->leads = $this->section->leads;

        return view('livewire.board.show-section');
    }

    public function updateBoard()
    {
        $this->emit('updateSections');
    }

    public function createLead()
    {
        $this->emit('createLead');
        $this->section->createLead();
        $this->section->refresh();
        $this->updateBoard();
    }
}
