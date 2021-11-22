<?php

namespace App\Http\Livewire\Forms;

use App\Models\Section;
use App\Models\Status;
use Illuminate\Session\SessionManager;
use Livewire\Component;

class SectionForm extends Component
{
    public $board;
    public $section;
    public $title;

    public $statusOptions;
    public $selected_state_id;

    protected $rules = [
        'title' => 'required',
        'selected_state_id' => 'required'
    ];

    public function mount(SessionManager $session, $board, $section = null)
    {
        $this->board = $board;
        $this->section = $section;

        $this->statusOptions = Status::all();

        if ($this->section) {
            $this->title = $section['title'];
            $this->selected_state_id = $section->getStatusIds()[0];
        }
    }
    public function submitSection()
    {
        $this->validate();

        $fields = [
            'title' => $this->title,
            'status_ids' => $this->selected_state_id
        ];

        if ($this->section) {
            $this->section->fill($fields);
            $this->section->save();
            $this->emit('closeSection');
        } else {
            $this->board->sections()->create($fields);
            $this->emit('stopCreating');
        }

        $this->emit('updateBoard');
    }

    public function render()
    {
        return view('livewire.forms.section-form');
    }

    public function removeSection() {
        $this->emit('closeSection');
        $this->emit('removeSection', $this->section);
    }
}
