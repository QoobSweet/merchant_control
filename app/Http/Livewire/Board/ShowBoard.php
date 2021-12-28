<?php

namespace App\Http\Livewire\Board;

use App\Models\Section;
use Livewire\Component;

class ShowBoard extends Component
{
    public $board;

    // blade routing booleans
    public $creatingSection = false;
    public $creatingLead = false;

    protected $listeners = ['updateBoard', 'createSection', 'removeSection', 'editSection', 'createLead', 'editLead', 'stopCreating'];

    public function render()
    {
        $this->board = $this->board->fresh();

        return view('livewire.board.show-board');
    }

    public function updateBoard() { $this->board = $this->board->fresh(); }

    public function createLead() { $this->creatingLead = true; }
    public function createSection() { $this->creatingSection = true; }
    public function removeSection(Section $section)
    {
        $section->delete();
        $this->updateBoard();
    }

    public function stopCreating()
    {
        $this->creatingSection = false;
        $this->creatingLead = false;
    }
}
