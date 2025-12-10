<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_0_proba',
        'class_1_proba',
        'no_teks',
        'user_id',
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
}
