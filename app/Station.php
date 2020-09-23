<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class, "station_id", "id");
    }
}
