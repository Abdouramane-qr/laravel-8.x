<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        'article',
        'nom',
        'quantite',
        'price',
        'adresse',
        'email',
         'telephone',
    ];

    private $Prixtotl;
    private $total;
    public $ptixtt;

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function type()
    {
        return $this->hasMany(Commande::class, 'commande_id', 'id');
    }

    public function recette()
    {
        return $this->hasMany(Recette::class, 'recette_id', 'id');
    }
}
