<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Silvanite\NovaToolPermissions\Traits\HasAccessControl;

/**
 * @method static inCorso()
 */
class Prenotazioni extends Model
{
    use HasAccessControl;

    protected $fillable = [
        'note', 'status', 'fattura_id', 'data_prenotazione'
    ];

    protected $casts = [
        'data_prenotazione' => 'date',
    ];

    public function stanza()
    {
        return $this->HasOne(Camera::class, 'prenotazione_id');
    }

    public function fattura()
    {
        return $this->belongsTo(Fattura::class, 'fattura_id');
    }

    public function scopeInCorso($query)
    {
        return $query->where('status', 'I');
    }


}
