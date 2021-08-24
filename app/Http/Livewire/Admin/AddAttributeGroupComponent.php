<?php

namespace App\Http\Livewire\Admin;

use App\Models\AttributeGroup;
use Livewire\Component;

class AddAttributeGroupComponent extends Component
{
    public $name;
    public $sort_order = 1;

    public function addAttributeGroup()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $attributeGroup = new AttributeGroup();
        $attributeGroup->name = $this->name;
        $attributeGroup->sort_order = $this->sort_order;
        $attributeGroup->save();
        session()->flash('success', 'Attribute Group has been created successfully');
        return redirect()->to('/admin/attribute-groups');
    }
    public function render()
    {
        return view('livewire.admin.add-attribute-group-component')->layout('layouts.admin');
    }
}
