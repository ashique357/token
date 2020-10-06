<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable=['coupon','use_number','amount','date'];

    public function admin(){
        return $this->belongsTo('App/User','role:0');
    }

    public function getDate(){
        $time = Carbon\Carbon::now();
        return $time->format('Y-m-d');
    }

}
