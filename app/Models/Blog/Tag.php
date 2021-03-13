<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model{
    use HasFactory;

    //relación muchos a muchos
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
