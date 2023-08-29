<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErreurCuisine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'restau',
        'date',
        'erreur',
    ];
}
