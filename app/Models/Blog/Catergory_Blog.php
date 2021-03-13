<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catergory_Blog extends Model
{
    use HasFactory;

    //relación uno a muchos
    public function posts(){
        return $this->hasMany(Post::class);

    }
}
