<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuisinierInventaire extends Model
{
    use HasFactory;

    protected $guarded = [];

    function product() {
        return $this->belongsTo(CuisinierProduct::class, "cuisinier_product_id");
    }
}
