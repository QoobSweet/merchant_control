<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StatusCollection extends Model
{
    use HasFactory;

    protected $fillable = ['label'];

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }
}
