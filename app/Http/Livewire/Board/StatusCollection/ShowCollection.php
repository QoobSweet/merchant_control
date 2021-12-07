<?php

namespace App\Http\Livewire\Board\StatusCollection;

use App\Models\AriaColor;
use Livewire\Component;

class ShowCollection extends Component
{
    public $board;
    public $collection;
    public $editingProperties;

    public $listeners = ['stopEditing', 'closeCollection'];

    public function editCollection() { $this->editingProperties = true; }
    public function closeCollection() { $this->editingProperties = false; }
    public function stopEditing() { $this->editingProperties = false; }

    public function deleteCollection()
    {
        $this->collection->delete();
        $this->emit('updateBoard');
    }
    public function render()
    {
        return view('livewire.board.status-collection.show-collection');
    }
}
