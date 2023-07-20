<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'fonction',
        'libelle',
        
    ];
    public function user(){
        return $this->hasMany(user::class);
    }
}
