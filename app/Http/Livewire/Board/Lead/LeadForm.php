<?php

namespace App\Http\Livewire\Board\Lead;

use App\Models\Status;
use App\Models\User;
use App\Models\UserActions;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LeadForm extends Component
{
    public $board;
    public $lead = null;
    public $editing = true;

    public $title;
    public $contact_name;
    public $contact_phone;
    public $contact_email;
    public $company_name;
    public $company_phone;
    public $company_website;
    public $company_address;
    public $company_city;
    public $company_state;
    public $company_zip_code;
    public $company_country_id;
    public $statuses;

    // build options for select drop downs
    public $statusOptions;
    public $valueOptions;
    public $stateOptions;
    public $countryOptions;

    protected $rules = [
        'title' => 'required|min:5',
        'contact_name' => 'required|min:3',
        'contact_phone' => 'required',
    ];

    public function mount(SessionManager $session, $board, $lead = null)
    {
        $this->board = $board;
        $this->editing = true;

        // setup field variable array for collections
        foreach ($this->board->statusCollections as $collection) {
            $this->statuses[$collection->label] =  '';
        }

        if ($lead) {
            $this->lead = $lead;
            $this->editing = false;
            $this->title = $lead->title;
            $this->contact_name = $lead['contact_name'];
            $this->contact_phone = $lead['contact_phone'];
            $this->contact_email = $lead['contact_email'];
            $this->company_name = $lead['company_name'];
            $this->company_phone = $lead['company_phone'] === 0 | null ? '' : $lead['company_phone'];
            $this->company_website = $lead['company_website'];
            $this->company_address = $lead['company_address_line_one'];
            $this->company_city = $lead['company_city'];
            $this->company_state = $lead['company_state'];
            $this->company_zip_code = $lead['company_zip_code'];
            //$this->company_country_id = $lead['company_country_id'];
            $this->statuses = $lead->statuses;
        }
    }

    public function submitLead()
    {
        $this->validate();

        $user = User::find(Auth::user()->id);

        $fields = [
            'title' => $this->title,
            'contact_name' => $this->contact_name,
            'contact_phone' => $this->contact_phone,
            'contact_email' => $this->contact_email,
            'company_name' => $this->company_name,
            'company_phone' => $this->company_phone,
            'company_website' => $this->company_website,
            'company_address_line_one' => $this->company_address,
            'company_city' => $this->company_city,
            'company_state' => $this->company_state,
            'company_zip_code' => $this->company_zip_code,
            //'company_country_id' => $this->company_country_id,
            'statuses' => $this->statuses
        ];

        $userActionFields = [
            'user_id' => $user->id,
            'old_model' => $this->lead ? clone($this->lead) : null
        ];

        if ($this->lead) {
            // build action to be saved, and clone old lead before values are filled
            $this->lead->fill($fields);
            $this->lead->save();


            // save new model to action and save
            $userActionFields['new_model'] = $this->lead->toArray();
            $userActionFields['lead_id'] = $this->lead->id;

            $userAction = $this->board->userActions()->create($userActionFields);

            $this->editing = false;
        } else {
            $lead = $this->board->leads()->create($fields);

            // save new model to action and save
            $userActionFields['new_model'] = $lead->toArray();
            $userActionFields['lead_id'] = $lead->id;
            $this->board->userActions()->create($userActionFields);
            $lead->transactions()->create([
                'amount' => 0,
                'comment' => 'Starting Balance.'
            ]);

            $this->emit('stopCreating');
        }

        $this->emit('updateSections');
    }

    public function removeLead() {
        $this->lead->delete();
        $this->emit('updateSections');
    }

    public function render()
    {
        return view('livewire.board.lead.lead-form');
    }

    public function editLead() {
        $this->editing = true;
    }

    public function stopEditing() {
        $this->editing = false;
    }
}
