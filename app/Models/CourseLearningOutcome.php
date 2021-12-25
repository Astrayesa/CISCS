<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseLearningOutcome extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        "title_en",
        "title_id",
        "desc_en",
        "desc_id",
        "percent_to_graduate_LO",
        "lesson_plan_id",
        "LO_id",
    ];

    public function Topics()
    {
        return $this->hasMany(Topic::class, 'CLO_id', 'id');
    }
}
