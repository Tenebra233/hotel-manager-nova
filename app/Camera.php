<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{


    public function piano()
    {
        return $this->belongsTo(Piano::class, 'piano_id');
    }

    public function prenotazione()
    {
        return $this->belongsTo(Prenotazioni::class, 'prenotazione_id');
    }
}
