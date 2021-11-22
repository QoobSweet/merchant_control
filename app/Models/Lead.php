<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $with = ['board'];

    protected $guarded = [];

    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function stateStatus()
    {
        return $this->hasOne(Status::class, 'id', 'state_status_id');
    }

    public function valueStatus()
    {
        return $this->hasOne(Status::class, 'id', 'value_status_id');
    }

    public function valueAriaColor()
    {
        if ($this->valueStatus) {
            return $this->valueStatus->ariaColor['aria_color_tag'];
        }

        return null;
    }

    public function stateAriaColor()
    {
        return $this->stateStatus->ariaColor['aria_color_tag'];
    }
}
