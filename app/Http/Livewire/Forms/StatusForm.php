<?php

namespace App\Http\Livewire\Forms;

use App\Models\AriaColor;
use Illuminate\Session\SessionManager;
use Livewire\Component;

class StatusForm extends Component
{
    public $board;
    public $status;
    public $label;
    public $selectedCollectionId;
    public $availableCollections;
    public $selectedColorId;
    public $availableColors;
    public $creating;
    public $editingProperties;

    public $listeners = [ 'updateStatusCollections' ];

    protected $rules = [
        'label' => 'required|min:3',
        'selectedColorId' => 'required',
        'selectedCollectionId' => 'required'
    ];

    public function mount(SessionManager $session, $board, $status = null)
    {
        $this->board = $board;

        // set available colors for selection drop down
        $this->availableColors = AriaColor::all();
        $this->availableCollections = $this->board->statusCollections;

        // fill in form with current values
        if ($status) {
            $this->status = $status;
            $this->label = $this->status['label'];
            $this->selectedCollectionId = $status->status_collection_id;
            $this->selectedColorId = $this->status->ariaColor->id ?? '';
        }
    }

    public function render()
    {
        return view('livewire.forms.status-form');
    }

    public function submitStatus()
    {
        $this->validate();

        $fields = [
            'label' => $this->label,
            'aria_color_id' => intval($this->selectedColorId),
            'status_collection_id' => intval($this->selectedCollectionId)
        ];

        if ($this->status) {
            $this->status->fill($fields);
            $this->status->save();
            $this->emit('closeStatus');
        } else {
            $this->board->statuses()->create($fields);
            $this->emit('stopCreating');
        }

        $this->emit('updateBoard');
    }

    public function updateStatusCollections()
    {
        $this->availableCollections = $this->board->statusCollections->fresh();
    }
}
