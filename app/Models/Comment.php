<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\AnswersToComment;

class Comment extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'description',
        'user_id',
        'post_id',
        'updated_at',
        'created_at',
        'answer_id'
    ];

    public function user (){

        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function answer_comment(){

        return $this->hasMany(AnswersToComment::class, 'comment_id', 'id');
    }
}
