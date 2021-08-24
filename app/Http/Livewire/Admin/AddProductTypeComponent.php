<?php

namespace App\Http\Livewire\Admin;

use App\Models\Type;
use Livewire\Component;

class AddProductTypeComponent extends Component
{
    public $name;
    public $sort_order = 1;

    public function addProductType()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $productType = new Type();
        $productType->name = $this->name;
        $productType->sort_order = $this->sort_order;
        $productType->save();
        session()->flash('success', 'Product Type has been created successfully');
        return redirect()->to('/admin/product-type');
    }

    public function render()
    {
        return view('livewire.admin.add-product-type-component')->layout('layouts.admin');
    }
}
