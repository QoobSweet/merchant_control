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

    // blade routing booleans
    public $creatingSection = false;
    public $creatingLead = false;

    protected $listeners = ['updateBoard', 'createSection', 'editSection', 'createLead', 'editLead', 'stopCreating'];

    public function render()
    {
        $this->board = $this->board->fresh();

        return view('livewire.show-board');
    }

    public function updateBoard() { $this->board = $this->board->fresh(); }

    public function createLead() { $this->creatingLead = true; }
    public function createSection() { $this->creatingSection = true; }

    public function stopCreating()
    {
        $this->creatingSection = false;
        $this->creatingLead = false;
    }
}
