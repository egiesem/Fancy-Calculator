<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Calc extends Model
{
    protected $table = 'calcs';
    public $incrementing = false;
    protected $fillable = [
        'id'
    ];

}
