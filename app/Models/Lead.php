<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $with = ['section', 'board'];

    protected $fillable = ['title'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function board()
    {
        return $this->section()->board();
    }
}
