<?php

namespace App\Http\Livewire\Admin;

use App\Models\OptionalProductGroup;
use Livewire\Component;

class EditOptionalProductGroupComponent extends Component
{
    public $name;
    public $optional_product_group_id;

    public function mount($optional_product_group_id)
    {
        $optionalProductGroup = OptionalProductGroup::find($optional_product_group_id);
        $this->name = $optionalProductGroup->name;
        $this->optional_product_group_id = $optionalProductGroup->id;
    }

    public function editOptionalProductGroup()
    {
        $this->validate(['name' => 'required']);
        $optionalProductGroup = OptionalProductGroup::find($this->optional_product_group_id);
        $optionalProductGroup->name = $this->name;
        $optionalProductGroup->save();
        session()->flash('success', 'Optional Product Group has been updated successfully');
        return redirect()->to('/admin/optional-product-groups');
    }

    public function render()
    {
        return view('livewire.admin.edit-optional-product-group-component')->layout('layouts.admin');
    }
}
