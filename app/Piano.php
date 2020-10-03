<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piano extends Model
{
    public function camera(){
        return $this->hasMany(Camera::class, 'piano_id');
    }
}
