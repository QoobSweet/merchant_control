<?php

namespace App\Http\Livewire\Board;

use Livewire\Component;

class EditBoard extends Component
{
    public $board;
    public $collectionField;
    public $statusField;


    public $listeners = ['updateBoard', 'updateStatuses', 'updateCollections'];

    protected $rules = [
        'statusField' => 'required'
    ];


    public function render()
    {
        return view('livewire.board.edit-board');
    }

    public function updateBoard() { $this->board = $this->board->fresh(); }

    public function updateStatuses() { $this->updateBoard(); }
    public function updateCollections() { $this->updateBoard(); }

    public function submitStatus()
    {
        $this->validate();

        $this->board->statuses()->create([
            'label' => $this->statusField
        ]);

        $this->updateBoard();
    }
}
