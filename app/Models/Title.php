<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Translatable;

class Title extends Model
{
    use HasFactory, Translatable;

    public $timestamps = true;

    protected $fillable = [
        'id',
        'post_id',
        'user_id',
        'title_kz',
        'title_ru',
        'title_en',
        
     
    ];
}
