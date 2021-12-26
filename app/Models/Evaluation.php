<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluation extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        "file",
        "type",
        "percent_to_graduate_CLO",
    ];

    /**
     * The clos that belong to the Evaluation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function clos()
    {
        return $this->belongsToMany(CourseLearningOutcome::class, 'course_learning_outcome_evaluations', 'evaluation_id', 'CLO_id');
    }
}
