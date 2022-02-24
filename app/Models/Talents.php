<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talents extends Model
{
    use HasFactory;

    protected $table = 'talents';

    protected $fillable = [
        'user_id',
        'gender',
        'phone',
        'category',
        'birthday_year',
        'height',
        'weight',
        'chest',
        'hips',
        'shoes',
        'job_reference'
    ];
}
