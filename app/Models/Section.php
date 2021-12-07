<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Integer;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'status_ids'];


    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    public function sectionStatusSubscriptions()
    {
        return $this->hasMany(SectionStatusSubscription::class, 'section_id', 'id');
    }

    public function statuses()
    {
        return $this->hasManyThrough(Status::class, SectionStatusSubscription::class, 'section_id', 'id', 'id', 'status_id');
    }
}
