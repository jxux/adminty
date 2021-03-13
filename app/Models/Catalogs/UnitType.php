<?php

namespace App\Models\Catalogs;

Use Illuminate\Database\Eloquent\Builder;

class UnitType extends ModelCatalog{

    protected $table = "cat_unit_types";
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'active',
        'symbol',
        'description',
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::addGlobalScope('active', function (Builder $builder) {
    //         $builder->where('active', 1);
    //     });
    // }

    public function item_unit_types()
    {
        return $this->hasMany(ItemUnitType::class);
    }
}
