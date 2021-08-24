<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomFieldOption extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;

    public function customField()
    {
        return $this->belongsTo(CustomField::class);
    }
}
