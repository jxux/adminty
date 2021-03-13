<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Catalogs\Country;
use App\Models\Catalogs\Department;
use App\Models\Catalogs\District;
use App\Models\Catalogs\IdentityDocumentType;
use App\Models\Catalogs\Province;
use Illuminate\Database\Eloquent\Builder;

class Persons extends Model{
    use HasFactory;

    protected $table = 'persons';
    protected $with = ['identity_document_type', 'country', 'department', 'province', 'district'];
    protected $fillable = [
        // 'type',
        'code',
        'identity_document_type_id',
        'number',
        'name',
        'trade_name',
        'country_id',
        'department_id',
        'province_id',
        'district_id',
        'address',
        'email',
        'telephone',
        'perception_agent',
        'state',
        'condition',
        'percentage_perception',
        // 'person_type_id',
        'comment',
        'enabled',
        'contact',
        'url'
    ];

    public function addresses(){
        return $this->hasMany(PersonAddress::class);
    }

    public function identity_document_type(){
        return $this->belongsTo(IdentityDocumentType::class, 'identity_document_type_id');
    }

    // public function documents(){
    //     return $this->hasMany(Document::class, 'customer_id');
    // }

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

    // public function scopeWhereType($query, $type){
    //     return $query->where('type', $type);
    // }

    // public function getAddressFullAttribute(){
    //     $address = trim($this->address);
    //     $address = ($address === '-' || $address === '')?'':$address.' ,';
    //     if ($address === '') {
    //         return '';
    //     }
    //     return "{$address} {$this->department->description} - {$this->province->description} - {$this->district->description}";
    // }

    // public function more_address(){
    //     return $this->hasMany(PersonAddress::class);
    // }

    // public function person_type(){
    //     return $this->belongsTo(PersonType::class);
    // }

    public function scopeWhereIsEnabled($query){
        return $query->where('enabled', true);
    }

    public function getContactAttribute($value){
        return (is_null($value))?null:(object) json_decode($value);
    }

    public function setContactAttribute($value){
        $this->attributes['contact'] = (is_null($value))?null:json_encode($value);
    }
}
