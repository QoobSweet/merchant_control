<?php

namespace App\Http\Livewire\Forms;

use App\Models\AriaColor;
use Livewire\Component;

class StatusCollectionForm extends Component
{
    public $board;
    public $collection;
    public $label;
    public $creating;
    public $editingProperties;


    protected $rules = [
        'label' => 'required|min:3'
    ];

    public function mount()
    {
        // fill in form with current values
        if ($this->collection) {
            $this->label = $this->collection['label'];
           }
    }

    public function submitCollection()
    {
        $this->validate();

        $fields = [
            'label' => $this->label,
        ];

        if ($this->collection) {
            $this->collection->fill($fields);
            $this->collection->save();
            $this->emit('closeCollection');
        } else {
            $this->board->statusCollections()->create($fields);
            $this->emit('stopCreating');
        }

        $this->emit('updateBoard');
        $this->emit('updateStatusCollections');
    }

    public function render()
    {
        return view('livewire.forms.status-collection-form');
    }
}
