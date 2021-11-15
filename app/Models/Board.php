<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Board extends Model
{
    use HasFactory;

    protected $with = ['user', 'team'];

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

    public function createSection()
    {
        $section = new Section();

        $this->sections()->create([
            'title' => 'new Section'
        ]);
    }
}
