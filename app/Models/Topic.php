<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        "title_en",
        "title_id",
        "indicator",
        "start_week",
        "end_week",
        "learning_method",
        "percent_to_LO",
        "CLO_id",
    ];

    public function Clo()
    {
        return $this->belongsTo(CourseLearningOutcome::class, 'CLO_id');
    }
}
