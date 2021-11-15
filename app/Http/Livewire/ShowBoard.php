<?php

namespace App\Http\Livewire;

use App\Models\Board;
use App\Models\Section;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use function Psy\debug;

class ShowBoard extends Component
{
    public $board;
    public $sections;
    public $counter = false;

    protected $listeners = ['updateSections'];

    public function mount(SessionManager $session)
    {
        $this->board = Auth::user()->boards->fresh()[0];
        $this->sections = $this->board->sections;
    }

    public function render()
    {
        $this->board = Auth::user()->boards->fresh()[0];
        $this->sections = $this->board->sections;

        return view('livewire.show-board');
    }

    public function updateSections()
    {
        $this->render();
    }

    public function createSection()
    {
        $this->board->createSection();
        $this->board->refresh();
    }

    public function createLead()
    {

    }
}
