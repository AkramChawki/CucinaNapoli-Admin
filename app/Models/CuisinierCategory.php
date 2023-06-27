<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuisinierCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'acteur',
    ];
    
    protected $casts = [
        'acteur' => 'array',
    ];

    public function products()
    {
        return $this->hasMany(CuisinierProduct::class);
    }
}
