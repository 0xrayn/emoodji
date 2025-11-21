<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_name',
        'user_id',
        'assessment_id',
        'unlock_cost'
    ];

    public function unlockSessions()
    {
        return $this->morphMany(UnlockSession::class, 'unlockable');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
