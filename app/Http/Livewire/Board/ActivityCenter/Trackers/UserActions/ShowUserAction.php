<?php

namespace App\Http\Livewire\Board\ActivityCenter\Trackers\UserActions;

use Livewire\Component;

class ShowUserAction extends Component
{
    public $userAction;
    public $viewingChanges = false;

    public function render()
    {
        return view('livewire.board.activity-center.trackers.user-actions.show-user-action');
    }

    public function viewChanges() { $this->viewingChanges = true; }
    public function stopViewing() { $this->viewingChanges = false; }
}
