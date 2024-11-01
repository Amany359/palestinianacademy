<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory, SoftDeletes;

    // Define the table if the model name doesn't match the table name
    protected $table = 'settings';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'logo',
        'favicon',
        'facebook',
        'instagram',
        'messenger',
        'telegram',
        'youtube',
        'phone',
        'email',
        'title',
        'content',
        'address'
    ];

    // Optionally, specify which fields should be treated as dates
    protected $dates = ['deleted_at'];
}
