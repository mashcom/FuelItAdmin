<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Stand extends Model
{
    public function scopeBelongsToCompany($query)
    {
        return $query->whereCompanyId(Auth::user()->company_id);
    }

    public function allocation()
    {
        return $this->hasOne(MemberStand::class, "stand_id", "id");
    }

    public function location()
    {
        return $this->hasOne(Location::class,"id","location_id");
    }

    public function company(){
        return $this->hasOne(Company::class,'id','company_id');
    }
}
