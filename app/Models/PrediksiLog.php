<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrediksiLog extends Model
{
    protected $fillable = [
        'user_id',
        'prediksi_feature_id',
        'class_0_proba',
        'class_1_proba',
        'no_teks'
    ];


    public function feature()
    {
        return $this->belongsTo(PrediksiFeature::class, 'prediksi_feature_id');
    }
}
