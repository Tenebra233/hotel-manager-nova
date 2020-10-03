<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $casts = [
        'date' => 'datetime',
    ];
}
