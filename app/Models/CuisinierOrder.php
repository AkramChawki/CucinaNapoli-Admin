<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuisinierOrder extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        "product_ids" => "array"
    ];

    public function products()
    {
        return CuisinierProduct::whereIn("id", json_decode($this->product_ids))->get();
    }
}
