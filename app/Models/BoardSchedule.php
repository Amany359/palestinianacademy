<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardSchedule extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural form of the model
    protected $table = 'board_schedule';

    // Define the fillable attributes
    protected $fillable = ['title','image', 'employee_id'];

    /**
     * Relationship to the Employee model.
     * A BoardSchedule belongs to one Employee.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
