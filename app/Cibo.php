<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cibo extends Model
{
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function ciboOrdine(){
        return $this->hasMany(CiboOrdine::class,'cibo_id');
    }
}
