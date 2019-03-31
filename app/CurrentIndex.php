<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrentIndex extends Model
{
    protected $table = "current_indexes";

    public $timestamps = false;

    protected $fillable = ['contact', 'question_id'];
}
