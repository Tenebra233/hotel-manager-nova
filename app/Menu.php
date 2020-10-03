<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function cibo(){
        return $this->hasMany(Cibo::class, 'menu_id');
    }
}
