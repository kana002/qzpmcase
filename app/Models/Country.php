<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Translatable;

class Country extends Model
{
    use HasFactory, Translatable;

    public $timestamps = false;

    protected $table = 'countries';

    protected $fillable = [
        'id',
        'name_kz',
        'name_ru',
        'name_en',
        'updated_at',
        'created_at',
        
    ];
}
