<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrediksiLog extends Model
{
    protected $fillable = [
        'user_id',
        'prediksi_feature_id',
        'predicted_proba_class_0',
        'predicted_proba_class_1',
        'no_teks'
    ];

    public function feature()
    {
        return $this->belongsTo(PrediksiFeature::class, 'prediksi_feature_id');
    }
}
