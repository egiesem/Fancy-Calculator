<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalcDetail extends Model
{
    protected $table = 'calcs_detail';
    public $incrementing = false;
    protected $fillable = [
        'id','id_calcs','formula','result'
    ];
}
