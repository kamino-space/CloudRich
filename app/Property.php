<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'user',
        'sign',
        'amount',
        'mark',
        'time'
    ];
}
