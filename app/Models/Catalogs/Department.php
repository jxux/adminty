<?php

namespace App\Models\Catalogs;

class Department extends ModelCatalog{

    protected $with = ['provinces'];
    public $incrementing = false;
    public $timestamps = false;

    static function idByDescription($description)
    {
        $department = Department::where('description', $description)->first();
        if ($department) {
            return $department->id;
        }
        return '15';
    }

    public function provinces()
    {
        return $this->hasMany(Province::class);
    }
}
