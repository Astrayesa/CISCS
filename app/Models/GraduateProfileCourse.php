<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GraduateProfileCourse extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        "graduate_profile_id",
        "course_id"
    ];
}
