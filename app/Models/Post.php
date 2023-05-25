<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Title;
use App\Models\Traits\Translatable;

class Post extends Model
{
    use HasFactory, Translatable;

    protected $table = 'posts';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'title_id',
        'user_id',
        'description_kz',
        'description_ru',
        'description_en',
        
     
    ];
    
    public function title (){

        return $this->hasMany(Title::class, 'id', 'title_id');
    }

   
}
