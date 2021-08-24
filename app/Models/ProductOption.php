<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function productOptionValues()
    {
        return $this->hasMany(ProductOptionValue::class);
    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }
    public function optionValues()
    {
        return $this->hasMany(OptionValue::class);
    }
}
