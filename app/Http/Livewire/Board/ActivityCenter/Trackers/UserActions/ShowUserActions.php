<?php

namespace App\Http\Livewire\Board\ActivityCenter\Trackers\UserActions;

use Livewire\Component;

class ShowUserActions extends Component
{
    public $userActions;

    public function render()
    {
        return view('livewire.board.activity-center.trackers.user-actions.show-user-actions');
    }
}
