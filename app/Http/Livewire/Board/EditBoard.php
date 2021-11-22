<?php

namespace App\Http\Livewire\Board;

use Livewire\Component;

class EditBoard extends Component
{
    public $board;
    public $statuses;
    public $statusField;

    public $listeners = ['updateBoard', 'updateStatuses'];

    protected $rules = [
        'statusField' => 'required'
    ];


    public function render()
    {
        return view('livewire.board.edit-board');
    }

    public function updateBoard()
    {
        $this->board = $this->board->fresh();
    }

    public function updateStatuses()
    {
        $this->statuses = $this->board->statuses->fresh();
    }

    public function submitStatus()
    {
        $this->validate();

        $this->board->statusCollections[0]->statuses()->create([
            'label' => $this->statusField
        ]);

        $this->updateBoard();
    }
}
