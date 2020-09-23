<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{

    protected $fillable = ["product_id","available"];

}
