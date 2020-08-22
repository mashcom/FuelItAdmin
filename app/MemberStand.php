<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberStand extends Model
{
    public function member()
    {
        return $this->hasOne(Member::class, "id", "member_id");
    }

    public function allocator(){
        return $this->hasOne(User::class,"id","allocated_by");
    }

    public function payments(){
        return $this->hasMany(Payment::class,'allocation_id','id');
    }

    public function stand(){
        return $this->hasOne(Stand::class,'id','stand_id');
    }
}
