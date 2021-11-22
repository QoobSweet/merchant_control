<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Grab Board Owner
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * provided when shared with a team. Only 1 team per board max
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Grab all associated Sections
     */
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    /**
     * Grab all associated Leads
     */
    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    /**
     * Grab all associated Statuses
     */
    public function statusCollections()
    {
        return $this->hasMany(StatusCollection::class);
    }

    /**
     * Grab all status's within related collections
     */
    public function statuses()
    {
        return $this->hasManyThrough(Status::class, StatusCollection::class);
    }

    /**
     * @param $optionsArray array of key => values that serve to fill in data object Model: Section
     */
    public function createSection($optionsArray)
    {
        $this->sections()->create($optionsArray);
    }

    /**
     * @param $optionsArray array of key => values that serve to fill in data object Model: Lead
     */
    public function createLead($optionsArray)
    {
        $this->leads()->create($optionsArray);
    }
}
