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

    //** get User that owns board. Super Admin */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //** provided when shared with a team. Only 1 team per board max. */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    //** Grab all associated sections */
    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }
}
