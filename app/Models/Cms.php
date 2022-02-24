<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    use HasFactory;

    protected $table = 'cms';

    protected $fillable = [
        'page_title',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'page_sub_title',
        'page_sub_group',
        'is_active',
        'is_menu',
        'is_header',
        'is_footer',
        'short_desc',
        'description'
    ];
}
