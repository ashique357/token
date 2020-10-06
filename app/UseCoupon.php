<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UseCoupon extends Model
{
    public function admin(){
        return $this->belongsTo('App/User','role:0');
    }
}
