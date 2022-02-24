<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ftpages extends Model
{
    use HasFactory;

    protected $table = 'ftpages';

    protected $fillable = [
        'cat_id',
        'path'
    ];
}
