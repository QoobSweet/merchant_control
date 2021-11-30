<?php

namespace App\Http\Livewire\Board\Status;

use Livewire\Component;

class ShowStatus extends Component
{
    public $board;
    public $status;
    public $editingProperties;

    public $listeners = ['stopEditing', 'closeStatus'];

    public function render()
    {
        return view('livewire.board.status.show-status');
    }

    public function editStatus() { $this->editingProperties = true; }
    public function closeStatus() { $this->editingProperties = false; }
    public function stopEditing() { $this->editingProperties = false; }

    public function deleteStatus()
    {
        $this->status->delete();
        $this->emit('updateBoard');
    }
}
