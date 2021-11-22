<?php

namespace App\Http\Livewire\Forms;

use App\Models\Section;
use Illuminate\Session\SessionManager;
use Livewire\Component;

class SectionPropertiesForm extends Component
{
    public $section;
    public $title;

    protected $rules = [
        'section' => 'required'
    ];

    public function mount(SessionManager $session, $section)
    {
        $this->section = $section ?? new Section();
        $this->title = $section['title'];
    }
    public function submitSection()
    {
        $this->validate();
        $section = Section::findOrCreate($this->section['id']);
        $section['title'] = $this->title;
        $section->save();
        $this->emit('stopFocusing');
    }

    public function render()
    {
        return view('livewire.forms.section-properties-form');
    }
}
