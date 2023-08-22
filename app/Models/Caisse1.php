<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caisse1 extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'time',
        'caissierE',
        'caissierS',
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
        'signature',
    ];
}
