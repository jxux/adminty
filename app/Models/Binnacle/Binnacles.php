<?php

namespace App\Models\Binnacle;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Binnacles extends Model{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user',
        // 'external_id',
        'date',
        'start_time',
        'end_time',
        'hour',
        'client_id',
        'client',
        'category_id',
        'category',
        'period',
        'service_id',
        'service',
        'description',
        'status',
        // 'reviewer_id',
        // 'date_re',
        // 'description_re',
        // 'status_re',
    ];

    protected $dates = [
        'date',
        'date_re',
        'period',
        'start_time',
        'end_time',
    ];

    public function user(){
        return $this->belongsTo(User::class);
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


    public function getCategoryAttribute($value){
        return (is_null($value))?null:(object) json_decode($value);
    }

    public function setCategoryAttribute($value){
        $this->attributes['category'] = (is_null($value))?null:json_encode($value);
    }

    public function Category() {
        return $this->belongsTo(BinnacleCategory::class, 'category_id');
    }


    public function getServiceAttribute($value){
        return (is_null($value))?null:(object) json_decode($value);
    }

    public function setServiceAttribute($value){
        $this->attributes['service'] = (is_null($value))?null:json_encode($value);
    }

    public function Service() {
        return $this->belongsTo(BinnacleService::class, 'service_id');
    }


    public function getUserAttribute($value){
        return (is_null($value))?null:(object) json_decode($value);
    }

    public function setUserAttribute($value){
        $this->attributes['user'] = (is_null($value))?null:json_encode($value);
    }
}
