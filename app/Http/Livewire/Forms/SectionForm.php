<?php

namespace App\Http\Livewire\Forms;

use App\Models\Section;
use App\Models\SectionStatusSubscription;
use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Session\SessionManager;
use Livewire\Component;

class SectionForm extends Component
{
    public $board;
    public $section;
    public $title;

    public $statusOptions;
    public $selectedStatusId;
    public $selectedStatuses;

    protected $rules = [
        'title' => 'required'
    ];

    public function mount(SessionManager $session, $board, $section = null)
    {
        $this->selectedStatuses = new Collection();
        $this->board = $board;
        $this->section = $section;

        $this->statusOptions = $this->board->statuses;

        if ($this->section) {
            $this->title = $section->title;
            foreach($section->sectionStatusSubscriptions as $subscription) {
                $this->selectedStatuses->push($subscription->status);
            }
        }
    }


    public function addTrackedStatus() {
        $this->selectedStatuses->push(Status::all()->find($this->selectedStatusId));
    }

    public function submitSection()
    {
        $this->validate();

        $fields = [
            'title' => ucfirst($this->title)
        ];

        if ($this->section) {
            $this->section->fill($fields);
            $this->section->save();

            foreach($this->selectedStatuses as $status)
            {
                $this->section->sectionStatusSubscriptions()->firstOrCreate([
                    'status_id' => $status->id,
                ]);
            }

            $this->emit('closeSection');
        } else {
            $this->section = $this->board->sections()->create($fields);

            foreach($this->selectedStatuses as $status)
            {
                $this->section->sectionStatusSubscriptions()->create([
                    'status_id' => $status->id,
                ]);
            }

            $this->emit('stopCreating');
        }

        $this->emit('updateBoard');
    }

    public function render()
    {
        $this->statusOptions = $this->board->statuses->filter(function ($status)
        {
            foreach($this->selectedStatuses as $selectedStatus)
            {
                if($selectedStatus->id == $status->id) { return false; }
            }
            return true;
        });

        return view('livewire.forms.section-form');
    }

    public function removeSection() {
        $this->emit('closeSection');
        $this->emit('removeSection', $this->section);
    }
}
