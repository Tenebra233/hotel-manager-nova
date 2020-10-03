<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CiboOrdine extends Model
{
    public function ordine()
    {
        return $this->belongsTo(Ordine::class, 'ordine_id');
    }

    public function cibo()
    {
        return $this->belongsTo(Cibo::class, 'cibo_id');
    }
}
