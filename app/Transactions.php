<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $fillable = [
        'meter_number', 'mccode', 'card', 'cvc','expiration',
    ];
}
