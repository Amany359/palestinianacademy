<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoundrMessage extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'foundr_messages';

    // Define the attributes that can be mass-assigned
    protected $fillable = [
        'title',
        'image',
        'description',
    ];

    // Optionally, you could also add timestamps management if necessary
}
