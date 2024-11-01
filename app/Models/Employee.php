<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'employees';

    // If you want to allow mass assignment for these fields
    protected $fillable = [
        'name',
        'job_title',
        'academic_degrees',
        'professional_experiences',
        'image',
    ];

    public function capitals()
    {
        return $this->hasMany(Capital::class);
    }
    public function board_schedules()
    {
        return $this->hasMany(Board_schedule::class);
    }

    // Optionally, if you're using SoftDeletes or other traits, include them here
}
