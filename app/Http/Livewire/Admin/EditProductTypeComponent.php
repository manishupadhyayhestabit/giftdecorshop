<?php

namespace App\Http\Livewire\Admin;

use App\Models\Type;
use Livewire\Component;

class EditProductTypeComponent extends Component
{
    public $name;
    public $sort_order = 1;
    public $pro_type_id;

    public function mount($pro_type_id)
    {
        $productType = Type::find($pro_type_id);
        $this->name = $productType->name;
        $this->sort_order = $productType->sort_order;
        $this->pro_type_id = $productType->id;
    }
    public function updateProductType()
    {
        $this->validate(['name' => 'required']);
        $productType = Type::find($this->pro_type_id);
        $productType->sort_order = $this->sort_order;
        $productType->name = $this->name;
        $productType->save();
        session()->flash('success', 'Product Type has been updated successfully');
        return redirect()->to('/admin/product-type');
    }
    public function render()
    {
        return view('livewire.admin.edit-product-type-component')->layout('layouts.admin');
    }
}
