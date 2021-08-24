<?php

namespace App\Http\Livewire\Admin;

use App\Models\Attribute;
use App\Models\AttributeGroup;
use Livewire\Component;

class EditAttributeComponent extends Component
{
    public $name;
    public $attribute_group_id;
    public $sort_order = 1;
    public $attri_id;

    public function mount($attri_id)
    {
        $attribute = Attribute::find($attri_id);
        $this->attribute_group_id = $attribute->attribute_group_id;
        $this->name = $attribute->name;
        $this->sort_order = $attribute->sort_order;
        $this->attri_id = $attribute->id;
    }
    public function updateAttribute()
    {
        $this->validate(['name' => 'required', 'attribute_group_id' => 'required']);
        $attribute = Attribute::find($this->attri_id);
        $attribute->attribute_group_id = $this->attribute_group_id;
        $attribute->sort_order = $this->sort_order;
        $attribute->name = $this->name;
        $attribute->save();
        session()->flash('success', 'Attribute has been updated successfully');
        return redirect()->to('/admin/attributes');
    }

    public function render()
    {
        $attributeGroups = AttributeGroup::all();
        return view('livewire.admin.edit-attribute-component', ['attributeGroups' => $attributeGroups])->layout('layouts.admin');
    }
}
