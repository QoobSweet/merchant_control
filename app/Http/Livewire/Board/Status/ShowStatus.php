<?php

namespace App\Http\Livewire\Board\Status;

use Livewire\Component;

class ShowStatus extends Component
{
    public $status;

    public function render()
    {
        return view('livewire.board.status.show-status');
    }

    public function editStatus()
    {
        $this->editingProperties = true;
    }

    public function deleteStatus()
    {
        $this->status->delete();
        $this->emit('updateBoard');
    }
}
