<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $all)
 */
class Department extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        "code",
        "name_en",
        "name_id",
        "establishment_cert_num",
        "accreditation_cert_num",
        "accreditation_ranking",
        "accreditation_file"
    ];

    function getAccreditationFileAttribute($value)
    {
        return "/storage/" . $value;
    }
}
