<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bear extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'street',
        'street_number',
        'postal_code',
        'city',
        'country',
        'latitude',
        'longitude',
         'email',
         'distance'
    ];
}
