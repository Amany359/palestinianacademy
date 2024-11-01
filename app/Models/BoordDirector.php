<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoordDirector extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'boord_directors';

    // Define which attributes are mass assignable
    protected $fillable = [
        'title',
        'image',
        'description',
    ];
}
