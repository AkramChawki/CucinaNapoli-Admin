<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caisse2 extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'restau',
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
        'cheque',
        'signature',
    ];
}
