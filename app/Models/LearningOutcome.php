<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearningOutcome extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        "title_en",
        "title_id",
        "desc_en",
        "desc_id",
        "curriculum_id",
    ];

    function clos()
    {
        return $this->hasMany(CourseLearningOutcome::class);
    }
}
