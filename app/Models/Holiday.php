<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\HolidayFactory;


class Holiday extends Model
{
    use HasFactory;

    protected $table = 'holiday';

    protected $fillable = [
       'id',
       'idcountry',
       'name',
       'date',
       'fixed'
    ];

    protected static function newFactory()
    {
        return  HolidayFactory::new();
    }
}

