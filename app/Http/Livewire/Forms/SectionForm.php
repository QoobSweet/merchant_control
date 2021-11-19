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
        'section' => 'required'
    ];

    public function mount(SessionManager $session, $board, $section = null)
    {
        $this->board = $board;
        $this->section = $section;
        $this->title = $section ? $section->title : '';

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
            'board_id' => $this->board->id,
            'title' => $this->title,
            'status_ids' => $this->selected_state_id
        ];

        if ($this->section) {
            $this->section->save($fields);
        } else {
            $this->board->sections()->create($fields);
        }

        $this->emit('stopFocusing');
    }

    public function render()
    {
        $this->section = $this->section ?? new Section(['title'=> 'New Section']);
        return view('livewire.forms.section-form');
    }
}
