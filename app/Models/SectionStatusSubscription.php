<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionStatusSubscription extends Model
{
    use HasFactory;

    protected $fillable = ['status_id', 'section_id'];

    public function status()
    {
        return $this->hasOne(Status::class, 'id','status_id');
    }

    public function section()
    {
        return $this->hasOne(Section::class, 'id','section_id');
    }
}
