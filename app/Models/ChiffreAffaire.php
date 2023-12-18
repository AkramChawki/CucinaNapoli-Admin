<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiffreAffaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'restau',
        'montant',
        'montantE',
        'glovoE',
        'glovoC',
        'cartebancaire',
        'LivE',
        'LivC',
        'Compensation',
        'ComGlovo',
        'ComLivraison',
        'virement',
        'cheque',
    ];
}
