<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $fillable = ['country_id', 'name', 'slug', 'iso_code', 'status'];
    public $timestamps = false;
}
