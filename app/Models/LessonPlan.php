<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LessonPlan extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        "developer_name",
        "reference",
        "course_id",
    ];

    function clos()
    {
        $this->hasMany(CourseLearningOutcome::class);
    }
}
