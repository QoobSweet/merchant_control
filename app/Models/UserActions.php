<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActions extends Model
{
    use HasFactory;

    protected $casts = [
        'old_model' => AsCollection::class,
        'new_model' => AsCollection::class
    ];

    protected $fillable = [ 'user_id', 'lead_id', 'old_model', 'new_model' ];

    public function user() { return $this->belongsTo(User::class); }
    public function lead() { return $this->belongsTo(Lead::class); }

    public function getCreatedDateString() { return $this->created_at->toDateTimeString(); }

    public function makeNew($board, $user, Array $subField, $oldModel, $newModel) {
        $fields = [
            'user_id' => $user->id,
            'old_model' => $oldModel ?? null,
            'new_model' => $newModel ?? null,
        ];

        foreach ($subField as $key => $value) { $fields[$key] = $value; }

        $board->userActions()->create($fields);
    }

    public function getModelDiff() {
        $old = $this->old_model;
        $new = $this->new_model;

        $diff = [];

        foreach($new as $key => $newValue) {
           $oldValue =  $old ? $old[$key] : '';

            $exclusionKeys = [
                'created_at',
                'updated_at',
                'board',
                'transactions',
                'user_actions',
                'id',
            ];

            if (!in_array($key, $exclusionKeys) && $newValue !== $oldValue) {
                $diff[$key] =  $newValue . '; ';
            }
        }

        return $diff;
    }
}
