<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrediksiFeature extends Model
{
    protected $fillable = ['name', 'unlock_cost'];

    public function logs()
    {
        return $this->hasMany(PrediksiLog::class);
    }
}
