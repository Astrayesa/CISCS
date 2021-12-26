<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseLearningOutcomeEvaluation extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        "CLO_id",
        "evaluation_id",
    ];
}
