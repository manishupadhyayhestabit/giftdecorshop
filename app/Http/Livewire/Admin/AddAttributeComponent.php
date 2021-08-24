<?php

namespace App\Http\Livewire\Admin;

use App\Models\Attribute;
use App\Models\AttributeGroup;
use Livewire\Component;

class AddAttributeComponent extends Component
{
    public $name;
    public $attribute_group_id;
    public $sort_order = 1;

    public function addAttribute()
    {
        $this->validate([
            'name' => 'required',
            'attribute_group_id' => 'required',
        ]);
        $attribute = new Attribute();
        $attribute->name = $this->name;
        $attribute->attribute_group_id = $this->attribute_group_id;
        $attribute->sort_order = $this->sort_order;
        $attribute->save();
        session()->flash('success', 'Attribute has been created successfully');
        return redirect()->to('/admin/attributes');
    }

    public function render()
    {
        $attributeGroups = AttributeGroup::all();
        return view('livewire.admin.add-attribute-component', ['attributeGroups' => $attributeGroups])->layout('layouts.admin');
    }
}
