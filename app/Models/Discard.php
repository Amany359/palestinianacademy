<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discard extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'discard';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'title',
        'image',
        'description',
    ];

    // Optionally, specify any custom column types if needed (in this case, we won't need it since Laravel auto-detects)
}
