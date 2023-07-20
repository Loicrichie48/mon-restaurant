<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
   
    public function user(){
        return $this->hasMany(user::class);
    }

    public function plat(){
        return $this->belongsToMany(plat::class);
    }
}

