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
}
