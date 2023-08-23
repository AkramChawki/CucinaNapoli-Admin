<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuisinierProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'designation',
        'unite',
        'cuisinier_category_id',
    ];

    public function cuisinier_category()
    {
        return $this->belongsTo(CuisinierCategory::class);
    }
}
