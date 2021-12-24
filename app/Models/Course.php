<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        "code",
        "title_en",
        "title_id",
        "desc_en",
        "desc_id",
        "semester",
        "theory_credit",
        "non_theory_credit",
        "curriculum_id",
    ];

    function lesson_plan()
    {
        return $this->hasOne(LessonPlan::class);
    }

    function clos()
    {
        return $this->hasManyThrough(CourseLearningOutcome::class, LessonPlan::class);
    }
}
