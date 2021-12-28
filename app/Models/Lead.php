<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Events\TransactionCommitted;

class Lead extends Model
{
    use HasFactory;

    protected $with = ['board'];

    protected $guarded = [];

    protected $casts = [
        'statuses' => 'array'
    ];

    public function board() { return $this->belongsTo(Board::class); }

    public function comments() { return $this->hasMany(Comment::class); }

    public function transactions() { return $this->hasMany(Transactions::class); }

    public function userActions() { return $this->hasMany(UserActions::class); }

    /**
     * @StatusCollection $collection
     */
    public function getCollectionStatusValue($statusCollection)
    {
        return $this->statuses[$statusCollection->key];
    }

    public function setCollectionStatusValue($collection, $statusId)
    {
        $this->statuses[$collection->id] = $statusId;
    }
}
