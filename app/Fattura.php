<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fattura extends Model
{
    protected $fillable = [
        'data', 'aliquota_iva', 'totale', 'user_id'
    ];

    protected $casts = [
        'data' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function prenotazione()
    {
        return $this->hasMany(Prenotazioni::class, 'fattura_id');
    }
}
