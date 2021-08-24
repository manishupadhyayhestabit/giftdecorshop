<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['pincode_id', 'name', 'slug', 'description', 'near_by_cities', 'status'];
    public $timestamps = false;
}
