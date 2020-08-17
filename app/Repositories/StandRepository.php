<?php

namespace App\Repositories;

use App\Stand;
use Illuminate\Support\Facades\Auth;

class StandRepository
{
    public function getAll()
    {
        return Stand::with('allocation.member', 'location')->belongsToCompany()->simplePaginate(200);
    }

    public function findById($id){
        $stand = Stand::with('allocation.member', 'location','allocation.allocator')->whereId($id)->BelongsToCompany()->firstOrFail();
        return $stand;
    }
}
