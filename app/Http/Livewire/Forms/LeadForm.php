<?php

namespace App\Http\Livewire\Forms;

use App\Models\Lead;
use App\Models\Status;
use Illuminate\Session\SessionManager;
use Livewire\Component;
use MongoDB\Driver\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MetadataBag;

class LeadForm extends Component
{
    public $board;
    public $lead = null;
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
    public $value_status_id;
    public $state_status_id;

    // build options for select drop downs
    public $statusOptions;
    public $valueOptions;
    public $stateOptions;
    public $countryOptions;

    protected $rules = [
        'title' => 'required|min:5',
        'contact_name' => 'required|min:3',
        'contact_phone' => 'required|max:10|min:10',
        'state_status_id' => 'required',
    ];

    public function mount(SessionManager $session, $board, $lead = null)
    {
        $this->lead = $lead;
        $this->statusOptions = Status::all();
        $this->valueOptions = $this->statusOptions->where('status_collection_id', 2);
        $this->stateOptions = $this->statusOptions->where('status_collection_id', 1);

        if ($this->lead) {
            $this->title = $lead->title;
            $this->contact_name = $lead['contact_name'];
            $this->contact_phone = $lead['contact_phone'];
            $this->contact_email = $lead['contact_email'];
            $this->company_name = $lead['company_name'];
            $this->company_phone = $lead['company_phone'];
            $this->company_website = $lead['company_website'];
            $this->company_address = $lead['company_address_line_one'];
            $this->company_city = $lead['company_city'];
            $this->company_state = $lead['company_state'];
            $this->company_zip_code = $lead['company_zip_code'];
            //$this->company_country_id = $lead['company_country_id'];
            $this->value_status_id = $lead['value_status_id'];
            $this->state_status_id = $lead['state_status_id'];
        }
    }

    public function submitLead()
    {
        $this->validate();

        $fields = [
            'title' => $this->title,
            'contact_name' => $this->contact_name,
            'contact_phone' => $this->contact_phone,
            'contact_email' => $this->contact_email,
            'company_name' => $this->company_name,
            'company_phone' => intval($this->company_phone),
            'company_website' => $this->company_website,
            'company_address_line_one' => $this->company_address,
            'company_city' => $this->company_city,
            'company_state' => $this->company_state,
            'company_zip_code' => $this->company_zip_code,
            //'company_country_id' => $this->company_country_id,
            'state_status_id' => $this->state_status_id,
            'value_status_id' => $this->value_status_id
        ];

        if ($this->lead) {
            $this->lead->fill($fields);
            $this->lead->save();
        } else {
            $this->board->leads()->create($fields);
        }

        $this->emit('stopFocusing');
        $this->emit('updateLeads');
    }

    public function removeLead() {
        $this->lead->delete();
        $this->emit('stopFocusing');
        $this->emit('updateLeads');
    }

    public function render()
    {
        return view('livewire.forms.lead-form');
    }
}
