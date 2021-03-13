<?php

namespace App\Models\Binnacle;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binnacles_category extends Model{
    // use HasFactory;

    protected $fillable = [
        'code',
        'name',
    ];

}
