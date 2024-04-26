<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\CountryFactory;


class Country extends Model
{
    use HasFactory;

    protected $table='country';

    protected $fillable = [
        'id',
       'name'
    ];

    protected static function newFactory()
    {
        return  CountryFactory::new();
    }
}

