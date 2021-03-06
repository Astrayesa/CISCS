<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curriculum extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        "year",
        "name_en",
        "name_id",
        "department_id",
    ];

    function department()
    {
        return $this->belongsTo(Department::class);
    }

    function courses()
    {
        return $this->hasMany(Course::class);
    }

    function graduateProfiles()
    {
        return $this->hasMany(GraduateProfile::class);
    }

    function learningOutcomes()
    {
        return $this->hasMany(LearningOutcome::class);
    }

}
