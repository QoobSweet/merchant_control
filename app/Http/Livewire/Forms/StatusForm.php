<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class StatusForm extends Component
{
    public $board;
    public $status;
    public $label;

    protected $rules = [
        'label' => 'required|min:3'
    ];

    public function mount()
    {
        if ($this->status) {
            $this->label = $this->status['label'];
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
            'label' => $this->label
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
}
