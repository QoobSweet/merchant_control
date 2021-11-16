<?php

namespace App\Http\Livewire;

use App\Models\Board;
use App\Models\Section;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use MongoDB\Driver\Session;
use function Psy\debug;

class ShowBoard extends Component
{
    public $board;
    public $sections;
    public $creatingLead = false;

    protected $listeners = ['updateSections', 'createLead', 'clearPopupContext'];

    public function mount(SessionManager $session, Board $board)
    {
        $this->board = $board;
        $this->sections = $board->sections()->get();
    }
    public function render()
    {
        $this->board = $this->board->fresh();
        $this->sections = $this->board->sections()->get();
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
        $this->creatingLead = true;
        $this->render();
    }

    public function clearPopupContext()
    {
        $this->creatingLead = false;
    }
}
