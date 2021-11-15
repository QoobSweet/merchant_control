<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Integer;

class Section extends Model
{
    use HasFactory;

    /**
     * @var integer
     */
    public $board_id;

    /**
     * @var string
     */
    public $title;

    protected $fillable = ['board_id', 'title'];

    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    //** Grab all associated leads */
    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    public function createLead()
    {
        $this->leads()->create([
            'title' => 'new Lead'
        ]);
    }
}
