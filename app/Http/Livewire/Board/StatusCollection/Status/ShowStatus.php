<?php

namespace App\Http\Livewire\Board\StatusCollection\Status;

use App\Models\AriaColor;
use Illuminate\Session\SessionManager;
use Livewire\Component;

class ShowStatus extends Component
{
    public $board;
    public $status;
    public $colorTag;
    public $editingProperties;
    public $editingCollection;

    public $listeners = ['stopEditing', 'closeStatus', 'closeCollection'];

    public function mount(SessionManager $session, $board, $status = null)
    {
        if ($status) {
            $this->status = $status;
            $this->colorTag = $status->getColorTag();
        }
    }

    public function render()
    {
        return view('livewire.board.status-collection.status.show-status');
    }

    public function editStatus() { $this->editingProperties = true; }
    public function closeStatus() { $this->editingProperties = false; }

    public function editCollection() { $this->editingCollection = true; }
    public function closeCollection() { $this->editingCollection = false; }

    public function stopEditing() { $this->editingProperties = false; $this->editingCollection = false; }

    public function deleteStatus()
    {
        $this->status->delete();
        $this->emit('updateBoard');
    }
}
