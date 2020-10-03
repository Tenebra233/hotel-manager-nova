<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordine extends Model
{

    protected $casts = [
        'date' => 'datetime',
    ];

    public function ciboOrdine()
    {
        return $this->hasMany(CiboOrdine::class, 'ordine_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
