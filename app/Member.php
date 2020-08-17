<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Member extends Model
{

    public function scopeBelongsToCompany($query){
        return $query->whereCompanyId(Auth::user()->company_id);
    }
}
