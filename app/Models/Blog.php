<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['blog_header','blog_tekst','author_id', 'category_id'];  

    protected function author(){
        return $this->belongsTo(User::class);
    }

    public function comment(){
        return $this->hasMany(Comments::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
