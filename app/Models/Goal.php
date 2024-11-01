<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goal extends Model
{
    use HasFactory;

    protected $table = 'goal'; // Specify the table name if different from the model name

    protected $fillable = [
        'title',
        'description',
    ];

    // Optionally, you can define relationships here
}
