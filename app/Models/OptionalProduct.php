<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionalProduct extends Model
{
    use HasFactory;

    public function optionalProductGroup()
    {
        return $this->belongsTo(OptionalProductGroup::class);
    }
}
