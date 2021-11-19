<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Integer;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['title'];


    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    /**
     * Get Tracked Status's
     *
     * @return collection of subscribed status's
     */
    public function getStatusIds()
    {
        return explode(',', str_replace(' ', '', $this['status_ids']));
    }
}
