<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function availability(){
        return $this->hasOne(Availability::class,'product_id','id');
    }

    public function station(){
        return $this->hasOne(Station::class,"id","station_id");
    }
}
