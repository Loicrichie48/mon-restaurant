<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'plat_commande',
        'quantité',
      
    ];
    public function plat(){
        return $this->belongsToMany(plat::class);
    }
}
