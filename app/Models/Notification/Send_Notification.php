<?php

namespace App\Models\Notification;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Catalogs\Country;
use App\Models\Catalogs\Department;
use App\Models\Catalogs\District;
use App\Models\Catalogs\Province;

use App\Models\Mail\Document_Mail;

class Send_Notification extends Model{
    use HasFactory;

    protected $table = 'Send_notifications';
    protected $with = ['country', 'department', 'province', 'district'];
    protected $fillable = [
        'user_id',
        'user',
        'date',
        'client_id',
        'client',
        'period',
        'type',
        'format_id',
        'enabled',
    ];

    protected $dates = [
        'date',
        'period',
    ];

    public function more_address()
    {
        return $this->hasMany(Document_Mail::class);
    }


    public function getClientAttribute($value){
        return (is_null($value))?null:(object) json_decode($value);
    }

    public function setClientAttribute($value){
        $this->attributes['client'] = (is_null($value))?null:json_encode($value);
    }

    public function Client() {
        return $this->belongsTo(CurrencyType::class, 'client_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getUserAttribute($value){
        return (is_null($value))?null:(object) json_decode($value);
    }

    public function setUserAttribute($value){
        $this->attributes['user'] = (is_null($value))?null:json_encode($value);
    }


    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function province(){
        return $this->belongsTo(Province::class);
    }

    public function district(){
        return $this->belongsTo(District::class);
    }
}
