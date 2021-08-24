<?php

namespace App\Http\Livewire\Admin;

use App\Models\AttributeGroup;
use Livewire\Component;

class EditAttributeGroupComponent extends Component
{
    public $name;
    public $sort_order = 1;
    public $attri_group_id;

    public function mount($attri_group_id)
    {
        $attributeGroup = AttributeGroup::find($attri_group_id);
        $this->name = $attributeGroup->name;
        $this->sort_order = $attributeGroup->sort_order;
        $this->attri_group_id = $attributeGroup->id;
    }
    public function updateAttributeGroup()
    {
        $this->validate(['name' => 'required']);
        $attributeGroup = AttributeGroup::find($this->attri_group_id);
        $attributeGroup->sort_order = $this->sort_order;
        $attributeGroup->name = $this->name;
        $attributeGroup->save();
        session()->flash('success', 'Attribute Group has been updated successfully');
        return redirect()->to('/admin/attribute-groups');
    }

    public function render()
    {
        return view('livewire.admin.edit-attribute-group-component')->layout('layouts.admin');
    }
}
