<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //relación uno a muchos inversa
    public function user(){
        return $this->belongsTo(Post::class);
    }

    public function category_blog(){
        return $this->belongsTo(Category_Blog::class);
    }


    //relación muchos a muchos
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    
    //relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
