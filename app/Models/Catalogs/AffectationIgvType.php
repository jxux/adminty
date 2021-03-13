<?php

namespace App\Models\Catalogs;


class AffectationIgvType extends ModelCatalog
{
    use UsesTenantConnection;

    protected $table = "cat_affectation_igv_types";
    public $incrementing = false;
}
