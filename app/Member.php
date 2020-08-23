<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Member extends Model
{

    public function getNationalIdAttribute($national_id){
        //$national_id = preg_replace("^\\s^", "", $national_id);
        //$national_id = preg_replace("^\-^", "", $national_id);
        return strtoupper($national_id);
    }
    public function scopeBelongsToCompany($query){
        return $query->whereCompanyId(Auth::user()->company_id);
    }

    public function allocations(){
        return $this->hasMany(MemberStand::class,'member_id','id');
    }

}
