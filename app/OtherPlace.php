<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherPlace extends Model
{
    protected $fillable = ['name', 'lat', 'lng'];

    public $timestamps = false;
}
