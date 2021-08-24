<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $casts = ['images' => 'array', 'related_products' => 'array', 'attributes' => 'array',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function layout()
    {
        return $this->belongsTo(Layout::class);
    }

    public function categories()
    {
        return  $this->belongsToMany(Category::class);
    }

    public function productTypes()
    {
        return $this->belongsToMany(Type::class);
    }

    public function productDiscounts()
    {
        return $this->hasMany(ProductDiscount::class);
    }

    public function productOptions()
    {
        return $this->hasMany(ProductOption::class);
    }

    public function productOptionValues()
    {
        return $this->hasManyThrough(ProductOptionValue::class, ProductOption::class, 'product_id', 'product_option_id ', 'id', 'id');
    }
}
