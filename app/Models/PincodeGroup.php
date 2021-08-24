<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PincodeGroup extends Model
{
    use HasFactory;

    public function pincodes()
    {
        return $this->hasMany(GroupByPincode::class);
    }
}
