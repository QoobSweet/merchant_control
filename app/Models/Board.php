<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $with = ['user', 'team'];

    //** get User that owns board. Super Admin */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //** provided when shared with a team. Only 1 team per board max. */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    //** Grab all associated sections */
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
