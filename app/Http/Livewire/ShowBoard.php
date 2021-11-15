<?php

namespace App\Http\Livewire;

use App\Models\Board;
use App\Models\Section;
use Illuminate\Session\SessionManager;
use Livewire\Component;

class ShowBoard extends Component
{
    public $board;
    public $sections;
    public $counter = false;

    public function mount(SessionManager $session, $board)
    {
        $this->board = $board;
        $this->sections = $this->board->sections;
    }

    public function render()
    {
        if($this->counter) {
            $this->counter = false;
            dd($this);
        } else {
            $this->counter = true;
        }
        return view('livewire.show-board', ['board' => $this->board]);
    }

    public function createSection()
    {
        $this->board->createSection();
    }
}
