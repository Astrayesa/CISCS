<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GraduateProfile extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        "code",
        "title_en",
        "title_id",
        "aspect",
        "curriculum_id"
    ];

    function courses()
    {
        return $this->belongsToMany(Course::class, "graduate_profile_courses")->withTimestamps();
    }

}
