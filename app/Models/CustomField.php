<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;

    public function customFieldOptions()
    {
        return $this->hasMany(CustomFieldOption::class);
    }
}
