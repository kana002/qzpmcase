<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AnswersToComment extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'id',
        'description',
        'post_id',
        'user_id',
        'comment_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
