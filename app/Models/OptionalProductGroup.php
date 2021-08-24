<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionalProductGroup extends Model
{
    use HasFactory;


    public function optionalProducts()
    {
        return $this->hasMany(OptionalProduct::class);
    }
}
