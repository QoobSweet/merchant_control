<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = ['label', 'aria_color_id', 'status_collection_id'];

    /**
     * @var mixed|string
     */
    public $name;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Grab all leads with current status
     */
    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    public function ariaColor()
    {
        return $this->hasOne(AriaColor::class, 'id', 'aria_color_id');
    }

    public function sectionStatusSubscriptions()
    {
        return $this->belongsToMany(SectionStatusSubscription::class, 'status_id', 'id');
    }

    public function sections()
    {
        return $this->hasManyThrough(Section::class, SectionStatusSubscription::class, 'status_id', 'id', 'id', 'section_id');
    }

    /**
     * @return string returns tailwind css color tag subset. needs to be proceeded with 'bg-' or 'text-' to trigger
     * example html. class="bg-{{ $status->getColorTag() }}"
     */
    public function getColorTag()
    {
        return $this->ariaColor->aria_color_tag;
    }
}
