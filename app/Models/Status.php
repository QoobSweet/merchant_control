<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

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
}
