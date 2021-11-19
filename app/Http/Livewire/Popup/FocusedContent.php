<?php

namespace App\Http\Livewire\Popup;

use Livewire\Component;



class FocusedContent extends Component
{
    public $contextTitle;

    public function render()
    {
        return view('livewire.popup.focused-content');
    }
}
