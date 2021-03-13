<?php

namespace App\Models\Mail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document_Mail extends Model
{
    use HasFactory;

    protected $with = [];
    public $timestamps = false;
    protected $fillable = [
        'send_id',
        'date',
        'period',
        'client_id',
        'district_id',
        'main',
    ];

    protected $dates = [
        'date',
        'period',
    ];
}
