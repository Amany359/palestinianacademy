<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incorpation extends Model
{
    use HasFactory;

    // Define the table name explicitly
    protected $table = 'incorpation';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'title',
        'description',
    ];
}
