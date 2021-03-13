<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model{
    use HasFactory;

    //Relación polimorfica
    public function imagiable(){
        return $this->morphTo();
    }
}
