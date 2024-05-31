<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class comments extends Model
{
    protected $fillable = ['comment', 'blog_id', 'user_id', 'user_name'];
    use HasFactory;
    protected $table = 'comments';

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
